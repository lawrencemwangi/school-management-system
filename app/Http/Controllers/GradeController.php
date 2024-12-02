<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::all();
        return view('backend.admin.grades.list_grade', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('backend.admin.grades.add_grade');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'grade_name' => 'required|string',
            'grade_point' => 'required|numeric',
            'max_score' => 'required|numeric',
            'min_score' => 'required|numeric',
        ]);

        $grades = new Grade($validated); 
        $grades->save();

        return redirect()->route('grade.index')->with('success', [
            'message' => 'Grade added successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        return view('backend.admin.grades.update_grade', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grade $grade)
    {
        $validated = $request->validate([
            'grade_name' => 'required|string',
            'grade_point' => 'required|numeric',
            'max_score' => 'required|numeric',
            'min_score' => 'required|numeric',
        ]);

        $grade->update($validated);

        return redirect()->route('grade.index')->with('success', [
            'message' => 'Grade updated successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();

        return redirect()->route('grade.index')->with('success', [
            'message' => 'Grade delete successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }
}
