<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function showLocation()
    {
        $locations = Location::all();
        return view('aboutUs', compact('locations'));
    }

    public function showAboutUs()
    {
        return view('smartwaste.aboutUs');
    }
}
