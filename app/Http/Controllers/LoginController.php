<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showloginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            if ($user->hasRole('admin_besar')) {
                return redirect()->route('dashboard');
            } elseif ($user->hasRole('admin')) {
                return redirect()->route('dashboard');
            } elseif ($user->hasRole('sdm')) {
                return redirect()->route('dashboard');
            }
            
            return redirect()->intended('/');
        } else {
            return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
        }
    }
    
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $user->assignRole('sdm');

        return redirect()->route('login')->with('success', 'User registered successfully');
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
