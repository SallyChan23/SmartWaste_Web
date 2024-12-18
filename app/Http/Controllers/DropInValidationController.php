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
        // Retrieve or create a validation record for this DropIn
        $validation = DropInValidation::firstOrCreate(
            ['dropInId' => $id],
            [
                'status' => 'Pending',
                'weight' => 0,
                'pointsGenerated' => 0,
                'validationDate' => now(), // Ensure this is populated
                'created_at' => now(),     // Optional: to match timestamp columns
                'updated_at' => now()      // Optional: to match timestamp columns
            ]
        );

        // Return the validation view
        return view('admin.dropins.validate', compact('validation', 'id'));
    }

    // Process and verify drop-in data
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
    
        // Calculate points
        $points = ($request->weight > 0 ? $request->weight * 2 : 0) + 
                  ($request->quantity > 0 ? $request->quantity : 0);
    
        // Update drop_in_validation table
        $validation->update([
            'quantity' => $request->quantity ?? null,
            'weight' => $request->weight,
            'status' => $request->status,
            'pointsGenerated' => $points,
            'validationDate' => now(),
        ]);
    
        // Update drop_in table
        
        $dropIn = DropIn::find($id);
        $user = User::find($dropIn->userId);
        if ($user) {
            // Log the calculated points
            $newTotalPoints = DropIn::where('userId', $user->id)->sum('points');
            \Log::info("User Points Update", ['userId' => $user->id, 'newPoints' => $newTotalPoints]);
        
            // Update points
            $user->points = $newTotalPoints;
            $user->save();
        
            // Confirm save
            if ($user->wasChanged('points')) {
                \Log::info("User points updated successfully", ['points' => $user->points]);
            } else {
                \Log::error("User points not updated", ['userId' => $user->id]);
            }
    
        return redirect()->route('admin.dropin.index')->with('success', 'Drop-In Verified Successfully!');
    }
}
