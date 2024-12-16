<?php

namespace App\Http\Controllers;

use App\Models\DropIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DropInController extends Controller
{
    //
    public function index() {
        return view('smartwaste.dropin');
    }

    public function create(Request $request) {
        $id = $request->query('id');
        return view('smartwaste.createdropin', ['id'=>$id]);
    }

    public function dropinStatus() {
        return view('smartwaste.statusDropIn');
    }

    public function store(Request $request) {
        
        $validated = $request->validate([
            'locationId' => 'required|integer',
            'wasteType'=>'required|string|max:255',
            'wasteDetail'=>'required|string',
            'quantity'=>'required|integer',
            'weight'=>'required|integer',
            'picture'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date'=>'required|date'
        ]);

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $fileName = str_replace(' ', '-', $fileName); 
            $file->move(public_path('assets/uploads'), $fileName);
            
            DropIn::create([
                'userId' => Auth::user()->userId,
                'locationId' => $request->locationId,
                'wastePicture' => 'assets/uploads/' . $fileName, 
                'date' => $request->date,
                'quantity'=> $request->quantity,
                'weight'=> $request->weight,
                'status'=> 'Pending',
            ]);
            
            return redirect()->route('drop_in.status')->with('success', 'Drop In successfully added!');
        } else {
            return redirect()->back()->with('error', 'Failed to upload mission picture.');
        }
    }
}
