<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()

    {
        //dd('Authenticated User:', Auth::user());
        return view('smartwaste.home');
    }
}
