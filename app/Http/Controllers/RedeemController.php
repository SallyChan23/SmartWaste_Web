<?php
namespace App\Http\Controllers;

use App\Models\VoucherTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedeemController extends Controller
{
    public function index()
    {
 
        if (!Auth::check()) {
            return redirect()->route('auth.login')->withErrors('Please log in to view your profile.');
        }

        $user = Auth::user();

       
        $redeemedVouchers = VoucherTransaction::where('userId', Auth::id())->with('voucher')->paginate(4);
        return view('profile.redeem', compact('redeemedVouchers', 'user'));
    }
}

