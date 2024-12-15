<?php

namespace App\Http\Controllers;

use App\Models\VoucherTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Voucher;
class RedeemController extends Controller
{
    //
    public function index()
    {
        // Logic for the report page
        $redeemedVouchers = VoucherTransaction::where('userId', Auth::id())
        ->with('voucher') // Assuming the relationship is defined
        ->get();

        return view('profile.redeem', compact('redeemedVouchers'));
    }
}
