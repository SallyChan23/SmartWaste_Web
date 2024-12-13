<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class AboutUsController extends Controller
{
    public function showAboutUs()
    {
        $locations = Location::all();
        return view('smartwaste.aboutUs', compact('locations'));
    }
    
    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'fullName' => 'required|string|min:5|max:30',
            'email' => 'required|email|ends_with:@gmail.com',
            'message' => 'required|string|min:10|max:100',
            'iagree' => 'required|accepted',
        ]);
        return redirect()->back()->with('success', 'Thank you for contacting us!');
    }
}
