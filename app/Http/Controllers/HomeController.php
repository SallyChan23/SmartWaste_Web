<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Mission;
use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil hanya 2 misi dari database
        $missions = Mission::take(2)->get();
        $vouchers = Voucher::take(4)->get();
        $articles = Article::all();

        return view('smartwaste.home', compact('missions', 'vouchers', 'articles'));
    }
}
