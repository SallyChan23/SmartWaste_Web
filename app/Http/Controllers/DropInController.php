<?php

namespace App\Http\Controllers;

use App\Models\DropIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\DropInWasteDetail;
use App\Models\DropInWasteType;
use App\Models\Location;
use App\Models\WasteType;
use App\Models\DropInValidation;
class DropInController extends Controller
{
    //

    public function index() {
        $locations = Location::all(); // Fetch all locations from the table
        return view('smartwaste.dropin', compact('locations'));
    }



    public function create(Request $request) {


        $id = $request->query('id'); 
        $location = DB::table('location')->where('locationId', $id)->first();
        $wasteTypes = DB::table('waste_type')->get();
        $wasteDetails = DB::table('waste_details')->get();
    
        return view('smartwaste.createdropin', [
            'location' => $location, 
            'wasteTypes' => $wasteTypes,
            'wasteDetails' => $wasteDetails
        ]);
    }

    public function dropinStatus(Request $request) {
        $dropin = DB::table('drop_in')->where('dropInId', $request->query('id'))->get();
        return view('smartwaste.statusDropIn', ['status' => $dropin[0]->status]);
    }

    public function store(Request $request) {

        $rules = [
            'locationId' => 'required|integer',
            'wasteType' => 'required|integer',
            'wasteDetail' => 'required|array',
            'weight' => 'required|integer|min:1',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date' => 'required|date'
        ];
    
        // Add quantity validation only if wasteType is "Non-Organic" (2)
        if ($request->wasteType == 2) {
            $rules['quantity'] = 'required|integer|min:1';
        }
    
        // Validate the input
        $validated = $request->validate($rules);
    
        // Handle file upload
        $fileName = null;
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $fileName = str_replace(' ', '-', $fileName); 
            $file->move(public_path('assets/uploads'), $fileName);
        }
    
        // Insert into drop_in table
        $dropIn = DropIn::create([
            'userId' => Auth::id(),
            'locationId' => $request->locationId,
            'wastePicture' => 'assets/uploads/' . $fileName,
            'date' => $request->date,
            'quantity' => $request->wasteType == 2 ? $request->quantity : null, // Null for Organic Waste
            'weight' => $request->weight,
            'status' => 'Pending',
        ]);
    
        // Insert into drop_in_waste_type
        DropInWasteType::create([
            'wasteTypeId' => $request->wasteType,
            'dropInId' => $dropIn->dropInId,
        ]);
    
        // Insert into drop_in_waste_detail
        foreach ($request->wasteDetail as $wasteDetailId) {
            DropInWasteDetail::create([
                'wasteDetailId' => $wasteDetailId,
                'dropInId' => $dropIn->dropInId,
            ]);
        }
    
        // Insert into drop_in_validation
        DropInValidation::create([
            'dropInId' => $dropIn->dropInId,
            'quantity' => $request->wasteType == 2 ? $request->quantity : null,
            'weight' => $request->weight,
            'pointsGenerated' => 0,
            'status' => 'Pending',
            'validationDate' => now(),
        ]);
    
        // Redirect with success message
        return redirect()->route('drop_in.status', ['id' => $dropIn->dropInId])
                         ->with('success', 'Drop In created successfully!');
        
    }

    public function processPage()
    {
        // Fetch the drop-in requests for the logged-in user
        $user = Auth::user(); 
        $dropIns = DropIn::with(['location'])
        ->where('userId', auth()->id()) // Ensure this fetches requests for the logged-in user
        ->whereIn('status', ['Waiting for Dropped In', 'Declined', 'Pending'])
        ->paginate(2);

        return view('profile.process', compact('dropIns', 'user'));
    }

    public function destroy($id)
{
    $dropIn = DropIn::find($id);

    // Untuk check statusnya declined or engga
    if ($dropIn && $dropIn->status === 'Declined') {
        $dropIn->delete();
        return back()->with('success', 'Drop-in request deleted successfully.');
    }

    return back()->with('error', 'Unable to delete this drop-in request.');
}



    public function confirmDropIn($id)
    {
        // Retrieve the DropIn record for the given dropInId
        $dropIn = DropIn::findOrFail($id);

        // Update the status to "Already Dropped In"
        $dropIn->status = 'Already Dropped In';
        $dropIn->save();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Drop-In has been confirmed.');
    }

    // public function verifyDropIn($id)
    // {
    //     $validation = DropInValidation::findOrFail($id);

    //         // Check if not already verified
    //         if ($validation->status != 'Verified') {

    //         // Calculate points
    //         $points = 0;

    //         if ($validation->quantity > 0) { // Anorganic Waste
    //             $points = $validation->quantity * 10; // Example: 10 points per unit
    //         } elseif ($validation->weight > 0) { // Organic Waste
    //             $points = $validation->weight * 2; // Example: 2 points per kg
    //         }

    //         // Update pointsGenerated
    //         $validation->pointsGenerated = $points;
    //         $validation->status = 'Verified';
    //         $validation->save();

    //         // Update user's total points
    //         $user = User::find($validation->dropIn->userId);
    //         if ($user) {
    //             $user->points += $points;
    //             $user->save();
    //         }
    //     }

    //     return redirect()->back()->with('success', 'Drop-In Verified, and Points Updated!');
    // }


    public function report()
    {
        // $dropIns = DropIn::where('userId', auth()->id())
        //     ->where('status', 'Verified')
        //     ->with(['location', 'wasteType']) // Fetch related location and wasteType
        //     ->get();
        // return view('profile.report', compact('dropIns'));

        $validatedDropIns = DropInValidation::with('dropIn')
            ->where('status', 'Verified')
            ->whereHas('dropIn', function ($query) {
                $query->where('userId', auth()->id());
            })
            ->get();

        return view('profile.report', compact('validatedDropIns'));


    }



}