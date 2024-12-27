<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $req)
    {
        $req->validate([
            'name' => 'required|string|max:250',
            'username' => 'required|string|max:50|unique:users',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = new User;
        $user->name = $req->name;
        $user->username = $req->username;
        $user->phone_number = $req->phone;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();

        $credentials = $req->only('email', 'password');
        Auth::attempt($credentials);
        $req->session()->regenerate();

        return redirect()->route('home')->withSuccess('Registration successful! You are now logged in.');
    }

    public function login(Request $req)
    {
        $credentials = $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('adminPanel')->withSuccess('Welcome Admin!');
            }

            return redirect()->route('home')->withSuccess('Welcome back!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials are incorrect.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->withSuccess('You have successfully logged out.');
    }
}
