<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    protected int $maxAttempts = 3;
    protected int $lockoutSeconds = 60;

    public function showLogin(Request $request)
    {
        if (Auth::check()) {
            return Auth::user()->isAdmin()
                ? redirect()->route('admin.dashboard')
                : redirect()->route('home');
        }

        $lockoutSeconds = null;
        $lastEmail = session('last_login_email');

        if ($lastEmail) {
            $throttleKey = Str::lower($lastEmail) . '|' . $request->ip();
            if (RateLimiter::tooManyAttempts($throttleKey, $this->maxAttempts)) {
                $lockoutSeconds = RateLimiter::availableIn($throttleKey);
            }
        }

        return view('auth.login', compact('lockoutSeconds'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        session(['last_login_email' => $request->email]);

        $throttleKey = Str::lower($request->email) . '|' . $request->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, $this->maxAttempts)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            return back()->with('lockout_seconds', $seconds)->withInput($request->only('email'));
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            RateLimiter::clear($throttleKey);
            session()->forget('last_login_email');
            $request->session()->regenerate();

            return Auth::user()->isAdmin()
                ? redirect()->route('admin.dashboard')
                : redirect()->route('home');
        }

        RateLimiter::hit($throttleKey, $this->lockoutSeconds);

        $sisaPercobaan = $this->maxAttempts - RateLimiter::attempts($throttleKey);

        if ($sisaPercobaan <= 0) {
            // Reset lalu hit ulang, supaya window 60 detik dihitung PAS SAAT lockout terjadi
            RateLimiter::clear($throttleKey);
            RateLimiter::hit($throttleKey, $this->lockoutSeconds);
            for ($i = 1; $i < $this->maxAttempts; $i++) {
                RateLimiter::hit($throttleKey, $this->lockoutSeconds);
            }

            $seconds = RateLimiter::availableIn($throttleKey);
            return back()->with('lockout_seconds', $seconds)->withInput($request->only('email'));
        }

        throw ValidationException::withMessages([
            'email' => "Email atau password salah. Sisa percobaan: {$sisaPercobaan}x.",
        ]);
    }

    public function showRegister()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
