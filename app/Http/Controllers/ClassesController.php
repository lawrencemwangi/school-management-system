<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classes::all();
        return view('backend.admin.classes.list_class', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.classes.add_class');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_name' => 'required|string|max:255',
        ]);

        $classes = new Classes;
        $classes->class_name = $validated['class_name'];
        
        $classes->save();

        return redirect()->route('classes.index')->with('success',[
            'message' => 'Class added successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Classes $classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classes $classes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classes $classes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $classes)
    {
        //
    }
}
