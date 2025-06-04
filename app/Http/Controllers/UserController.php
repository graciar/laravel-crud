<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerForm(){
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        return view("auth/register");
    }

    public function loginForm(){
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        return view("auth/login");
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', // make sure the email is unique in the users table
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*\d).+$/',
                'confirmed',
            ],
        ], [
            'password.regex' => 'Password must contain at least one uppercase letter and one number.',
            'password.min' => 'Password must be at least 8 characters.',
        ]);

        $user = User::create($validated); 
        // password is hashed -> check user model!

        // $user = User::create([
        //     'name' => $validated['name'],
        //     'email' => $validated['email'],
        //     'password' => \Hash::make($validated['password']),
        //     // 'role' => 'user', // optionally set a default role
        // ]); // optional

        \Auth::login($user);

        // return redirect('/dashboard')->with('success', 'Registration successful!');
        
        if ($user->role === 'admin') {
            return redirect('/dashboard')->with('success', 'Registration successful!');
        } else {
            return redirect('/home')->with('success', 'Registration successful!');
        }

    }

    public function login(Request $request)
    {
        // Validate input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // return redirect()->intended('/dashboard');

            if (Auth::user()->role === 'admin') {
                return redirect('/dashboard')->with('success', 'Registration successful!');
            } else {
                return redirect('/home')->with('success', 'Registration successful!');
            }
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

}
