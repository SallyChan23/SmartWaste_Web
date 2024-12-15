<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;
use App\Models\VoucherTransaction;
use Illuminate\Support\Facades\Auth;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vouchers = Voucher::all();
        return view('smartwaste.voucher', compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('smartwaste.createvoucher');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'price'=>'required|string',
            'points'=>'required|integer',
            'voucherPicture'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        
        if ($request->hasFile('voucherPicture')) {
            $file = $request->file('voucherPicture');
            
            $fileName = time() . '-' . $file->getClientOriginalName();
            $fileName = str_replace(' ', '-', $fileName);
            
            $path = $file->storeAs('voucher-pictures', $fileName, 'public');
            
            Voucher::create([
                'name' => $request->name,
                'price' => $request->price,
                'pointsNeeded' => $request->points,
                'voucherPicture' => 'storage/voucher-pictures/' . $fileName,  
            ]);
    
            
            return redirect()->route('voucher.index')->with('success', 'Voucher successfully added!');
         }else {
            return redirect()->back()->with('error', 'Failed to upload mission picture.');
         }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $voucher = Voucher::where('voucherId', $id)->firstOrFail();
        $voucher->delete();
        return redirect()->route('voucher.index')->with('success', 'Voucher successfully deleted!');
    }

    public function redeem($voucherId)
    {
    $voucher = Voucher::findOrFail($voucherId);  
    $user = Auth::user();  

    if ($user->points < $voucher->pointsNeeded) {
        return redirect()->back()->with('error', 'Not enough points to redeem this voucher.');
    }

    $user->points -= $voucher->pointsNeeded;
    $user->save();

    VoucherTransaction::create([
        'userId' => $user->userId,
        'voucherId' => $voucher->voucherId,
        'status' => 'ongoing',
        'totalPoints'=>$voucher->pointsNeeded,
         
    ]);

    return redirect()->route('voucher.index')->with('success', 'Voucher redeemed successfully!');
    }
}