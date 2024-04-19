<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nisn' => ['required', 'string'], // Mengubah aturan validasi untuk NISN
            'password' => ['required', 'string'],
        ];
    }

    

    // public function authenticate(): void
    // {
    //     $this->ensureIsNotRateLimited();

    //     // Coba otentikasi menggunakan NISN atau NIP
    //     $credentials = $this->only('nisn', 'password');
    //     $user = User::where('nisn', $credentials['nisn'])->first();

    //     if (!$user) {
    //         $user = Guru::where('nip', $credentials['nisn'])->first();
            
    //     }
        
    //     if (! $user || ! Hash::check($credentials['password'], $user->password)) {
    //         RateLimiter::hit($this->throttleKey());

    //         throw ValidationException::withMessages([
    //             'nisn' => trans('auth.failed'),
    //         ]);
    //     }

    //     Auth::login($user,  $this->boolean('remember'));

    //     RateLimiter::clear($this->throttleKey());
    // }

    public function authenticate(): void
{
    $this->ensureIsNotRateLimited();

    $credentials = $this->only('nisn', 'password');

    // Coba otentikasi menggunakan NISN
    $user = User::where('nisn', $credentials['nisn'])->first();

    // Jika tidak ada pengguna dengan NISN, coba menggunakan NIP
    if (!$user) {
        $user = User::where('nip', $credentials['nisn'])->first();
    }

    // Jika tidak ada pengguna dengan NISN atau NIP, coba menggunakan id_admin
    if (!$user) {
        $user = User::where('id_admin', $credentials['nisn'])->first();
    }

    if (! $user || ! Hash::check($credentials['password'], $user->password)) {
        RateLimiter::hit($this->throttleKey());

        throw ValidationException::withMessages([
            'nisn' => trans('auth.failed'),
        ]);
    }

    Auth::login($user, $this->boolean('remember'));

    RateLimiter::clear($this->throttleKey());
}

    

    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'nisn' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('nisn')).'|'.$this->ip());
    }

    
}
