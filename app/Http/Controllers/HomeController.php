<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\Voucher;

class HomeController extends Controller
{
    public function index()
    {

        
        // Ambil hanya 2 misi
        $missions = Mission::take(2)->get();
        $vouchers = Voucher::all();
        
    
        // Kirim data ke view
        return view('smartwaste.home', compact('missions', 'vouchers'));
    }
    
}
