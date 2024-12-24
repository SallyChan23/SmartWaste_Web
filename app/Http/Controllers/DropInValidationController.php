<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DropInValidation;
use App\Models\DropIn;
use App\Models\User;

class DropInValidationController extends Controller
{
    // Show the validation form
    public function showValidationForm($id)
    {
        $validation = DropInValidation::firstOrCreate(
            ['dropInId' => $id],
            [
                'status' => 'Pending',
                'weight' => 0,
                'pointsGenerated' => 0,
                'validationDate' => now(), 
                'created_at' => now(),     
                'updated_at' => now()      
            ]
        );


        return view('admin.dropins.validate', compact('validation', 'id'));
    }

    
    public function verifyDropIn(Request $request, $id)
    
    {
        $request->validate([
            'quantity' => 'nullable|integer|min:0',
            'weight' => 'required|numeric|min:0',
            'status' => 'required|string|in:Verified,Declined',
        ]);
    
        $validation = DropInValidation::where('dropInId', $id)->first();
    
        if (!$validation) {
            return redirect()->back()->with('error', 'Validation record not found.');
        }
    
       
        $points = 0;

        if ($request->status === 'Verified') {
            $points = ($request->weight > 0 ? $request->weight * 10 : 0) +
                  ($request->quantity > 0 ? $request->quantity * 2 : 0);
        }
    
        
        $validation->update([
            'quantity' => $request->quantity ?? null,
            'weight' => $request->weight,
            'status' => $request->status,
            'pointsGenerated' => $points,
            'validationDate' => now(),
        ]);
    
        
        if ($request->status === 'Verified') {
            $dropIn = DropIn::find($id);
            if ($dropIn) {
                $dropIn->points += $points;
                $dropIn->status = 'Verified'; 
                $dropIn->save();
            }
        }elseif($request->status === 'Declined') {
                $dropIn = DropIn::find($id);
                if ($dropIn) {
                    $dropIn->status = 'Declined'; 
                    $dropIn->save();
                }
                
            
        }
        $dropIn = DropIn::where('dropInId', $id)->first();
        if ($dropIn) {
            
            $user = User::find($dropIn->userId);
    
            if ($user) {
                
                $user->points += $validation->pointsGenerated;
    
                
                $user->save();
    
                return redirect()->route('admin.dropin.index')->with('success', 'Drop-In Verified Successfully!');
            }
        }

        
        return redirect()->back()->with('error', 'User or DropIn not found.');
    }
}
