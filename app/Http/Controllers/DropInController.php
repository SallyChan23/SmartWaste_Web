<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropInController extends Controller
{
    //
    public function index() {
        return view('smartwaste.dropin');
    }

    public function create() {
        return view('smartwaste.createdropin');
    }
}
