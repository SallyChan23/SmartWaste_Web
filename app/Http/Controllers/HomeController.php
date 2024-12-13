<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\Voucher;

class HomeController extends Controller
{
    /**
     * Display the homepage with missions and vouchers.
     */
    public function index()
    {
        // Ambil 2 misi
        $missions = Mission::take(2)->get();

        // Ambil 4 voucher
        $vouchers = Voucher::take(4)->get();

        // Kirim data ke view
        return view('smartwaste.home', compact('missions', 'vouchers'));
    }
}
