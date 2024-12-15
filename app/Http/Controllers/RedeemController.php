<?php
namespace App\Http\Controllers;

use App\Models\VoucherTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedeemController extends Controller
{
    public function index()
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('auth.login')->withErrors('Please log in to view your profile.');
        }

        $user = Auth::user();

        // Logic for retrieving redeemed vouchers
        $redeemedVouchers = VoucherTransaction::where('userId', Auth::id())
            ->with('voucher') // Assuming the relationship is defined
            ->get();

        // Return the appropriate view
        return view('profile.redeem', compact('redeemedVouchers', 'user'));
    }
}

