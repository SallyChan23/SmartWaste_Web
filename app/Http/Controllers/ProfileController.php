<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class ProfileController extends Controller
{
    //
    public function index()
    {
        
        if (Auth::check()) {
            $user = Auth::user();

           
            return view('profile.profile', compact('user'));
        }
       
        return redirect()->route('auth.login')->withErrors('Please log in to view your profile.');
    }

    public function update(Request $request)
    {
    $user = Auth::user();

   
    $request->validate([
        'username' => 'required|string|max:255',
        'phoneNumber' => 'required|string|max:15',
        'email' => 'required|email|max:255',
        'password' => 'nullable|string|min:6|confirmed', 
    ]);

    $user->username = $request->username;
    $user->phoneNumber = $request->phoneNumber;
    $user->email = $request->email;

    if ($request->password) {
        $user->password = Hash::make($request->password);
    }

  
    $user->save();

    return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

    public function updatePicture(Request $request)
    {
        $request->validate([
            'profilePicture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $user = Auth::user();
    
        if ($user->profilePicture) {
            Storage::delete('public/' . $user->profilePicture);
        }
  
        $path = $request->file('profilePicture')->store('profile-pictures', 'public');
        $user->profilePicture = $path;
        $user->save();
    
        Log::info('Profile picture updated: ', ['path' => $path]);
    
        return redirect()->route('profile')->with('success', 'Profile picture updated successfully.');
    }
}

