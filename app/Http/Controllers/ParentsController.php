<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use App\Models\User;
use Illuminate\Http\Request;

class ParentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parents = Parents::all();
        return view('backend.admin.parents.list_parent', compact('parents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('backend.admin.parents.add_parent',compact('users'));
 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:0,1',
            'user_level' => 'required|in:0,1,2,3,4,5',
        ]);

        $users = User::find($validated['user_id']);

        if($users)
        {
            $users->user_level = $validated['user_level'];
            $users->status = $validated['status'];
            $users->save();
        }

        $parents = new Parents;
        $parents->user_id = $users->id;

        $parents->save();

        return redirect()->route('parents.index')->with('success', [
            'message' => 'Parent added successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Parents $parents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parents $parents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parents $parents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parents $parents)
    {
        //
    }
}
