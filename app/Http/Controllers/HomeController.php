<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Mission;
use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    //

    public function index()

    {
        $missions = Mission::all();
        $vouchers = Voucher::all();
        $articles = Article::all();
        return view('smartwaste.home', compact('missions', 
        'vouchers', 'articles'));
    }
}
