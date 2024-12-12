<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $missions = Mission::all();
        return view('smartwaste.mission', compact('missions'));
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
            'title'=>'required|string|max:255',
            'desc'=>'required|string',
            'points'=>'required|integer',
            'missionPicture'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        
        if ($request->hasFile('missionPicture')) {
            $file = $request->file('missionPicture');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $fileName = str_replace(' ', '-', $fileName); 
    
            
            $file->move(public_path('assets/uploads'), $fileName);
    
            
            Mission::create([
                'title' => $request->title,
                'totalPoints' => $request->points,
                'description' => $request->desc,
                'missionPicture' => 'assets/uploads/' . $fileName, // Simpan path relatif ke database
            ]);
    
            
            return redirect()->route('mission.index')->with('success', 'Mission successfully added!');
         }else {
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
    // Mengambil data Mission berdasarkan missionId
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
            'points'=>'required|integer',
            'missionPicture'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $mission = Mission::where('missionId', $id)->firstOrFail();

        
        if ($request->hasFile('missionPicture')) {
            $file = $request->file('missionPicture');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $fileName = str_replace(' ', '-', $fileName); 
    
            
            $file->move(public_path('assets/uploads'), $fileName);
    
            $mission->update([
                'title' => $request->title,
                'totalPoints' => $request->points,
                'description' => $request->desc,
                'missionPicture' => 'assets/uploads/' . $fileName, 
            ]);

            return redirect()->route('mission.index')->with('success', 'Mission successfully updated!');
         }
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
}
