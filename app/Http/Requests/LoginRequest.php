<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use function Laravel\Prompts\clear;

class LoginRequest extends FormRequest
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
            "email" => ["required", "email", "string"],
            "password" => "required|string",
        ];
    }
    public function messages(): array
    {
        return [
            // "email.required" => "Email is required.",
            // "email.email" => "Email must be a valid email address.",
            // "password.required" => "Password is required.",
            // "password.string" => "Not a valid datatype",
        ];
    }

    public function authenticate()
    {
        $this->ensureIsNotRateLimited();
        $data = $this->validated();
        // dd($data);

        try {
        // $user = User::with(['device'=>function($query){$query->select("devices.id","devices.user_id");}])->select("id","is_active")->where("email","bobsbf4@gmail.com")->firstorFail();
        $user = User::with("device:id,devices.user_id,is_active")->select("id","is_active")->where('email', $data['email'])->where("is_active", true)->firstorFail();
        if (! Auth::attempt(["email" => $data['email'], "password" => $data['password'], "is_active" => true], $this->boolean('remember')) || !$user->device->is_active) {
            RateLimiter::hit($this->throttleKey(), 300);
            throw ValidationException::withMessages(
                [
                    "email" => trans('auth.failed')
                    ]
                );
            }
            $user = Auth::user(); // guaranteed logged-in user
            if (! $user->device || ! $user->device->is_active) {
                Auth::logout();
                return back()->withErrors(['device' => 'Device inactive']);
                //maybe return to a particular view to make device active
            }
            //maybe the aoi version will need to throw but an exception bcs i don't know if back method works there
            // if ($user->device || $user->device->is_active) {
            //     $user = Auth::user(); // guaranteed logged-in user
            // }else {
            //     return back()->withErrors(['device' => 'Device inactive']);

            // }

            
        } catch (ModelNotFoundException $e) {
             throw ValidationException::withMessages(
                [
                    "email" => trans('auth.failed')
                    ]
                );
            }


        RateLimiter::clear($this->throttleKey());
    }
    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('email') . '|' . $this->ip()));
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
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ],);
    }
}
