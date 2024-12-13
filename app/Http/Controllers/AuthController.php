<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    
    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            // Redirect to the home page
            return redirect()->route('home');
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

        // $credentials = $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|min:6',
        // ]);
    
        // if (Auth::attempt($credentials)) {
        //     // $request->session()->regenerate(); // Regenerate session ID
        //     $request->session()->regenerate();

        //     dd('Authenticated User:', Auth::user());
    
        //     return redirect()->intended('home');
        // }

        // //dd('Auth attempt failed');
    
        // // Debugging: If login fails
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);

        // $credentials = $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|min:6',
        // ]);

        // // Attempt to authenticate
        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate(); // Regenerate session for security
    
        //     // Redirect to the intended page or profile
        //     return redirect()->intended('profile');
        // }
    
        // // If login fails
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Handle registration logic
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:user',
            'email' => 'required|string|email|max:255|unique:user',
            'password' => 'required|string|min:6|confirmed',
            'phoneNumber' => 'required|string|max:255',
        ]);

        // Create a new user with default values for role and points
        // User::create([
        //     'username' => $request->username,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password), 
        //     'phoneNumber' => $request->phoneNumber,
        //     'profilePicture' => null,
        //     'points' => 0,
        //     'role' => 'user',
        // ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Always hash passwords
            'phoneNumber' => $request->phoneNumber,
            'role' => 'user',
        ]);

        //dd('Session Data:', session()->all());

        return redirect()->route('login.post')->with('success', 'Registration successful! Please login.');
    }

    // Handle logout logic
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
