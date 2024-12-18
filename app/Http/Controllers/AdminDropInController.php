<?php

namespace App\Http\Controllers;

use App\Models\DropIn;
use App\Models\DropInValidation;
use Illuminate\Http\Request;
use App\Models\DropInWasteDetail;
use App\Models\DropInWasteType;

class AdminDropInController extends Controller
{

    public function index()
    {
        $pendingDropIns = DropIn::with(['user', 'location'])
        ->where('status', 'Pending')
        ->get();

        
        $droppedInRequests = DropIn::with(['user', 'location'])
        ->where('status', 'Already Dropped In')
        ->orWhere('status', 'Waiting for Dropped In')
        ->get();
    
        $pending =DropIn::with(['user', 'location'])
        ->where('status', 'Pending')
        ->get();

        $waiting = DropIn::with(['user', 'location'])
        ->where('status', 'Already Dropped In')
        ->orWhere('status', 'Waiting for Dropped In')
        ->get();


        return view('admin.dropins.index', compact('pendingDropIns', 'droppedInRequests','pending','waiting'));
    }

    // Accept Drop-In Request
    public function accept($id)
    {
        $dropIn = DropIn::findOrFail($id);
        $dropIn->update(['status' => 'Waiting for Dropped In']);

        return redirect()->back()->with('success', 'Request accepted successfully.');
    }

    public function decline($id)
    {
        $dropIn = DropIn::findOrFail($id);
        $dropIn->update(['status' => 'Declined']);

        return redirect()->back()->with('success', 'Request declined successfully.');
    }


    // Show Validation Form
    public function showValidationForm($id)
    {
        $dropIn = DropIn::findOrFail($id);
        return view('admin.dropins.validate', compact('dropIn'));
    }

    public function confirmDropIn($id)
    {
        $dropIn = DropIn::findOrFail($id);

        if ($dropIn->status !== 'Accepted') {
            return redirect()->back()->with('error', 'This request is not yet accepted.');
        }

        // Update status to 'Dropped In'
        $dropIn->update([
            'status' => 'Dropped In'
        ]);

        return redirect()->back()->with('success', 'Drop In confirmed successfully!');
    }


    // Validate Drop-In Request
    public function validateDropIn(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer',
            'weight' => 'required|integer',
            'status' => 'required|in:Verified,Declined',
        ]);

        // Update drop_in_validation table
        DropInValidation::create([
            'dropInId' => $id,
            'quantity' => $request->quantity,
            'weight' => $request->weight,
            'pointsGenerated' => 0,
            'status' => $request->status,
            'validationDate' => now(),
        ]);

        // Update drop_in table status
        $dropIn = DropIn::with(['wasteTypes','wasteDetails'])->findOrFail($id);
        $dropIn->status = $request->status;
        $dropIn->save();

        return redirect()->route('admin.dropin.index')->with('success', 'Validation completed.');
    }
}
