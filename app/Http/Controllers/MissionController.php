<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission;
use Illuminate\Support\Facades\Auth;
use App\Models\MissionTransaction;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $missions = Mission::paginate(6);
        $missionTransactions = MissionTransaction::with('mission')->where('status','ongoing')->get();
        $completedTransaction = MissionTransaction::with('mission')->where('status','completed')->get();
        return view('smartwaste.mission', compact('missions','missionTransactions','completedTransaction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('smartwaste.createmission');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'target' => 'required|integer',
            'points' => 'required|integer',
            'missionPicture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        if ($request->hasFile('missionPicture')) {
       
            $file = $request->file('missionPicture');
            
            
            $fileName = time() . '-' . $file->getClientOriginalName();
            $fileName = str_replace(' ', '-', $fileName);
    
            
            $path = $file->storeAs('mission-pictures', $fileName, 'public');
    
            
            Mission::create([
                'title' => $request->title,
                'totalPoints' => $request->points,
                'description' => $request->desc,
                'target' => $request->target,
                'missionPicture' => 'storage/mission-pictures/' . $fileName,  
            ]);
    
           
            return redirect()->route('mission.index')->with('success', 'Mission successfully added!');
        } else {
            return redirect()->back()->with('error', 'Failed to upload mission picture.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit($id)
    {
        $mission = Mission::where('missionId', $id)->firstOrFail();
    
        return view('smartwaste.editMission', compact('mission'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required|string|max:255',
            'desc'=>'required|string',
            'target'=>'required|integer',
            'points'=>'required|integer',
            'missionPicture'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $mission = Mission::where('missionId', $id)->firstOrFail();

        
        if ($request->hasFile('missionPicture')) {
            $file = $request->file('missionPicture');
            
         
            $fileName = time() . '-' . $file->getClientOriginalName();
            $fileName = str_replace(' ', '-', $fileName);
    
            
            $path = $file->storeAs('mission-pictures', $fileName, 'public');
    
            $mission->update([
                'title' => $request->title,
                'totalPoints' => $request->points,
                'description' => $request->desc,
                'target'=>$request->target,
                'missionPicture' => 'storage/mission-pictures/' . $fileName, 
            ]);

            
         }else {
            
            $mission->update([
                'title' => $request->title,
                'totalPoints' => $request->points,
                'description' => $request->desc,
                'target' => $request->target,
            ]);
         }

         return redirect()->route('mission.index')->with('success', 'Mission successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mission = Mission::where('missionId', $id)->firstOrFail();
        $mission->delete();
        return redirect()->route('mission.index')->with('success', 'Mission successfully deleted!');
    }

    public function startMission($missionId)
    {
    $mission = Mission::findOrFail($missionId);  
    $user = Auth::user();  

    MissionTransaction::create([
        'userId' => $user->userId,
        'missionId' => $mission->missionId,
        'status' => 'ongoing',
        'currentPoints'=>0,
        'startDate' => now(),
        'endDate' => now(),  
    ]);

    return redirect()->route('mission.index')->with('success', 'Mission started successfully!');
    }

    public function updateProgress(Request $request, $missionTransactionId)
    {
    
    $request->validate([
        'currentPoints' => 'required|integer|min:0',
    ]);

   
    $transaction = MissionTransaction::findOrFail($missionTransactionId);
    
   
    $transaction->currentPoints += $request->input('currentPoints');
    
    
    $mission = $transaction->mission; 
    if ($transaction->currentPoints >= $mission->target && $transaction->status !== 'completed') {
        $transaction->status = 'completed';

        $user = $transaction->user; 
        $user->points += $mission->totalPoints; 
        $user->save();
    }
    
    $transaction->save();

    return redirect()->route('mission.index')->with('success', 'Progress updated successfully!');
    }

    public function searchMission(Request $request){
        $query = $request->input('query');
        $missions = Mission::where('title', 'like', '%' . $query . '%')->orWhere('totalPoints', $query)->paginate(6);
        return view('smartwaste.searchMission', compact('missions'))->with('query', $query);
    }

}
