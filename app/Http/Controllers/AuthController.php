<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email:rfc,dns|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect()->route('login')->with('message', 'Silakan cek email untuk verifikasi!');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email must not be empty',
            'email.email' => 'Invalid email format',
            'password.required' => 'Password must not be empty',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $user = Auth::user();

            if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail) {
                if (!$user->hasVerifiedEmail()) {
                    Auth::logout();
                    return back()->withErrors([
                        'email' => 'Your email is not verified. Please check your inbox.',
                    ])->onlyInput('email');
                }
            }

            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('success', 'Login successful');
        }

        return back()->withErrors([
            'email' => 'Email or password is incorrect.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'You have been logged out.');
    }
}
