<?php

namespace App\Http\Controllers;

use App\Models\Dorm;
use Illuminate\Http\Request;

class DormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dorms = Dorm::all();
        return view('backend.admin.dorms.list_dorms',compact('dorms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.dorms.add_dorms');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'dorm_name' => 'required|string|max:50',
            'dorm_capacity' => 'required|string',
        ]);

        $dorms = new Dorm;
        $dorms->dorm_name = $validated['dorm_name'];
        $dorms->dorm_capacity = $validated['dorm_capacity'];

        $dorms->save();

        return redirect()->route('dorms.index')->with('success', [
            'message' => 'Dorm Added Successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Dorm $dorm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dorm $dorm)
    {
        return view('backend.admin.dorms.update_dorm', compact('dorm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dorm $dorm)
    {
        $validated = $request->validate([
            'dorm_name' => 'required|string|max:255',
            'dorm_capacity' => 'required|string',
        ]);

        $dorm->dorm_name = $validated['dorm_name'];
        $dorm->dorm_capacity = $validated['dorm_capacity'];
        $dorm->update();
        
        return redirect()->route('dorms.index')->with('success',[
            'message' => 'Dorm added successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dorm $dorm)
    {
        $dorm->delete();
        
        return redirect()->route('dorms.index')->with('success',[
            'message' => 'Dorm deleted successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }
}
