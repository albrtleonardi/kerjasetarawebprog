<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'UserName' => 'required|string|max:255',
            'Email' => 'required|string|email|max:255|unique:users,Email',
            'Password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'UserName' => $request->UserName,
            'Email' => $request->Email,
            'Password' => Hash::make($request->Password), 
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }


    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['Email' => $credentials['email'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function dashboard()
{
    return view('dashboard', ['user' => Auth::user()]);
}
}
