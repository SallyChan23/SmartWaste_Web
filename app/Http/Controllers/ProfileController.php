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
        // $user = Auth::user();
        // return view('profile.profile', compact('user'));

        if (Auth::check()) {
            $user = Auth::user();

            //dd('Authenticated User:', $user);
            return view('profile.profile', compact('user'));
        }
        //dd('User is not authenticated:', session()->all());
        return redirect()->route('login')->withErrors('Please log in to view your profile.');
    }

    // public function uploadPicture(Request $request)
    // {
    //     if (!$request->hasFile('profilePicture')) {
    //         dd('No file uploaded');
    //     }
    
    //     // Validate file type
    //     $request->validate([
    //         'profilePicture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);
    
    //     // Get the user
    //     $user = Auth::user();
    
    //     // Debug user data
    //     dd('Authenticated User:', $user);
    
    //     // Delete old picture if it exists
    //     if ($user->profilePicture) {
    //         Storage::delete('public/' . $user->profilePicture);
    //     }
    
    //     // Store new picture
    //     $path = $request->file('profilePicture')->store('profile-pictures', 'public');
    //     dd('File stored at:', $path);
    
    //     // Update user profile
    //     $user->profilePicture = $path;
    //     $user->save();
    
    //     // Debug updated user data
    //     dd('Updated User:', $user);
    
    //     // Redirect with success message
    //     return redirect()->route('profile')->with('success', 'Profile picture updated successfully.');
    // }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the request
        $request->validate([
            'username' => 'required|string|max:255|unique:user,username,' . $user->userId . ',userId',
            'phoneNumber' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:6|confirmed', // password is optional
        ]);

        // Update user fields
        $user->username = $request->username;
        $user->phoneNumber = $request->phoneNumber;
        $user->email = $request->email;

        // Update password only if provided
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        // Save changes
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

    public function updatePicture(Request $request)
    {
        $request->validate([
            'profilePicture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $user = Auth::user();
    
        // Remove old profile picture if exists
        if ($user->profilePicture) {
            Storage::delete('public/' . $user->profilePicture);
        }
    
        // Store new profile picture
        $path = $request->file('profilePicture')->store('profile-pictures', 'public');
        $user->profilePicture = $path;
        $user->save();
    
        Log::info('Profile picture updated: ', ['path' => $path]);
    
        return redirect()->route('profile')->with('success', 'Profile picture updated successfully.');
    }
}