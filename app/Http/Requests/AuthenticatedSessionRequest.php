<?php

namespace App\Http\Requests;

use App\Mail\EnrollDeviceOtp;
use App\Models\User;
use Ichtrojan\Otp\Otp;
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

        // 1. Find User (using proper relationship selection)
        $user = User::with(['device' => function ($q) {
            $q->select('id', 'devices.user_id', 'is_active', 'public_key');
        }])
            ->where('email', $data['link_token'])
            ->where('is_active', true)
            ->first();

        // 2. Check Credentials
        if (!$user || !Auth::attempt(['email' => $data['link_token'], 'password' => $data['secret_hash']])) {
            RateLimiter::hit($this->throttleKey(), 300);
            throw ValidationException::withMessages([
                "success" => false,
                "message" => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());

        // 3. Logic: Is this the same device we already know?
        $isSameDevice = $user->device &&
            $user->device->is_active &&
            $user->device->public_key === ($data["open_token"] ?? null);

        if ($isSameDevice) {
            // PATH A: Immediate Login
            $user->tokens()->where('name', 'auth_token')->delete();
            $token = $user->createToken("auth_token", ['*'], now()->addMonths(3))->plainTextToken;

            return [
                "action" => "login",
                "token"  => $token
            ];
        } 
            
        // PATH B: Device Mismatch or Inactive - Trigger Enrollment
            $code = (new Otp)->generate($user->email, 'numeric', 6, 10);

            if ($code->status) {
                Mail::to($user->email)->queue(new EnrollDeviceOtp($user->name, $code->token));

                return [
                    "action" => "enroll",
                    "message" => "New device detected. Please verify with the OTP sent to your email."
                ];
            }

            throw new \Exception("Failed to generate OTP.");
        

        //notify user of the switch
        //app should hit another route for enrollment before touching this route again
    }




    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('link_token') . '|' . $this->ip()));
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
            'link_token' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ],);
    }

}

 
