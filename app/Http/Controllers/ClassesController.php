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
            'class_capacity' => 'required|string',
        ]);

        $classes = new Classes;
        $classes->class_name = $validated['class_name'];
        $classes->class_capacity = $validated['class_capacity'];
        
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
    public function edit(Classes $class)
    {
        return view('backend.admin.classes.update_class', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classes $classes)
    {
        $validated = $request->validate([
            'class_name' => 'required|string',
            'class_capacity' => 'nullable|string',
        ]);

        $classes->class_name = $validated['class_name'];
        $classes->class_capacity = $validated['class_capacity'];

        $classes->update();
        return redirect()->route('classes.index')->with('success', [
            'message' => 'Class updated successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $classes)
    {
        $classes->delete();
        return redirect()->route('classes.index')->with('success', [
            'message' => 'class deleted successfully',
            'duration' => $this->akert_message_duration,
        ]);
    }
}
