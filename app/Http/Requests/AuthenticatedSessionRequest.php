<?php

namespace App\Http\Requests;

use App\Mail\EnrollDeviceOtp;
use App\Models\User;
use Ichtrojan\Otp\Models\Otp;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use function Laravel\Prompts\clear;
use function Laravel\Prompts\error;

class AuthenticatedSessionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "link_token" => ["required", "email"],
            "secret_hash" => "required|string",
            "open_token" => "sometimes|string"
        ];
    }
    public function messages(): array
    {
        return [
                "link_token.required" => "Email is required.",
                "link_token.email" => "Email must be a valid email address.",
                "secret_hash.required" => "Password is required.",
                "secret_hash.string" => "Not a valid datatype",
        ];
    }

    public function authenticate()

    {
        $this->ensureIsNotRateLimited();
        $data = $this->validated();
       
        try {
        $user = User::with("device:id,devices.user_id,is_active,public_key")->select("id","is_active")->where('email', $data['email'])->where("is_active", true)->firstorFail();
        if (! Auth::attempt(["email" => $data['link_token'],"password" => $data['secret_hash'],"is_active" => true], $this->boolean('remember')) || !$user->device->is_active) {
            RateLimiter::hit($this->throttleKey(),300);
            throw ValidationException::withMessages(
                [
                    "success" => false,
                    "email" => trans('auth.failed')
                ]
                );
        }

        } 
        catch (ModelNotFoundException $e) {
            throw ValidationException::withMessages(
                [
                    "success" => false,
                    "email" => trans('auth.failed')
                ]
            );
        }
        if ($user->device->is_active && $user->device->public_key === $data["open_token"]) {
            $user->tokens()->where("tokenable_id","auth_token")->delete();
            $token = $user->createToken("auth_token",['*'],now()->addMonths(3))->plainTextToken;
            if ($token) {
                RateLimiter::clear($this->throttleKey());
                return response()->json([
                    "success" => true,
                    "message" => "login successfull",
                    // "data" => [
                    //     "token" => $token
                    // ]
                    ],201);
            }
            else if ($user->device->is_active){

                $user->device()->update("is_active",false);
                $code = (new Otp)->generate($user->email, 'numeric', 6, 10);
                if ( $code->status) {
                Mail::to($user->email)->queue(new EnrollDeviceOtp($user->name,$code->token));
                return response()->json([
                "success" => true,
                "status" => "enroll user",
                "message" => "Device enrollment almost complete, please input the otp code",
                // "data" => [
                //     "code" => $code
                // ]
            ],201);
                } else {
                    return response()->json([
                        "success" => false,
                        "message" => "login unsuccessfull, an error occured"]
                    ,500);
                }        
            }
           
        }
        else {
            return response()->json([
                "success" => false,
                "message" => "Ops an error occured"
            ],202);
        }
        RateLimiter::clear($this->throttleKey());
        //notify user of the switch
        //app should hit another route for enrollment before touching this route again
    }
        


    
    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey():string{
        return Str::transliterate(Str::lower($this->string('link_token').'|'.$this->ip()));
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        // event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            "success" => false,
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ],);
    }

}

