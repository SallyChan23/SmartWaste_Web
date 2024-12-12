<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedeemController extends Controller
{
    //
    public function index()
    {
        // Logic for the report page
        return view('profile.redeem'); // Assumes there is a Blade view named report.blade.php
    }
}
