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
        $locations = Location::all(); 
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
    
        if ($request->wasteType == 2) {
            $rules['quantity'] = 'required|integer|min:1';
        }
    
        $validated = $request->validate($rules);
    
        $fileName = null;
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $fileName = str_replace(' ', '-', $fileName); 
            $file->move(public_path('assets/uploads'), $fileName);
        }
    
        $dropIn = DropIn::create([
            'userId' => Auth::id(),
            'locationId' => $request->locationId,
            'wastePicture' => 'assets/uploads/' . $fileName,
            'date' => $request->date,
            'quantity' => $request->wasteType == 2 ? $request->quantity : null, 
            'weight' => $request->weight,
            'status' => 'Pending',
        ]);
    
        DropInWasteType::create([
            'wasteTypeId' => $request->wasteType,
            'dropInId' => $dropIn->dropInId,
        ]);
    
        foreach ($request->wasteDetail as $wasteDetailId) {
            DropInWasteDetail::create([
                'wasteDetailId' => $wasteDetailId,
                'dropInId' => $dropIn->dropInId,
            ]);
        }
    
        DropInValidation::create([
            'dropInId' => $dropIn->dropInId,
            'quantity' => $request->wasteType == 2 ? $request->quantity : null,
            'weight' => $request->weight,
            'pointsGenerated' => 0,
            'status' => 'Pending',
            'validationDate' => now(),
        ]);
    
        return redirect()->route('drop_in.status', ['id' => $dropIn->dropInId])
                         ->with('success', 'Drop In created successfully!');
        
    }

    public function processPage()
    {
        // proses yang diliat logged in user
        $user = Auth::user(); 
        $dropIns = DropIn::with(['location'])
        ->where('userId', auth()->id()) // hanya untuk login user
        ->whereIn('status', ['Waiting for Dropped In', 'Declined', 'Pending'])
        ->paginate(2);

        return view('profile.process', compact('dropIns', 'user'));
    }

    public function destroy($id)
{
    $dropIn = DropIn::find($id);

    if ($dropIn && $dropIn->status === 'Declined') {
        $dropIn->delete();
        return back()->with('success', 'Drop-in request deleted successfully.');
    }

    return back()->with('error', 'Unable to delete this drop-in request.');
}

    public function confirmDropIn($id)
    {
        $dropIn = DropIn::findOrFail($id);

        $dropIn->status = 'Already Dropped In';
        $dropIn->save();
    
        return redirect()->back()->with('success', 'Drop-In has been confirmed.');
    }

    public function report()
    {
        if (!Auth::check()) {
            return redirect()->route('auth.login')->withErrors('Please log in to view your profile.');
        }

        $user = Auth::user();

        $validatedDropIns = DropInValidation::with('dropIn')
            ->where('status', 'Verified')
            ->whereHas('dropIn', function ($query) {
                $query->where('userId', auth()->id());
            })
            ->get();

        $dropIns = DropIn::where('userId', Auth::id())->get();

        
        return view('profile.report', compact('validatedDropIns', 'dropIns', 'user'));
    }
}