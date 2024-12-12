<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function index()
    {
        // Logic for the report page
        return view('profile.report'); // Assumes there is a Blade view named report.blade.php
    }
}
