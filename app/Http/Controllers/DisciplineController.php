<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\Student;
use App\Models\Classes;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $disciplines = Discipline::all();
        return view('backend.teacher.discipline.list_report', compact('disciplines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $classes = Classes::all();
        return view('backend.teacher.discipline.discipline_record', 
        compact('students','classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|integer|exists:students,id',
            'class_id' => 'required|integer|exists:classes,id',
        ]);
        
        $discipline = new Discipline;
        $discipline->student_id = $validated['student_id'];
        $discipline->class_id = $validated['class_id'];
        $discipline->discipline_type = $request->input('discipline_type');
        $discipline->discipline_comment = $request->input('discipline_comment');
        $discipline->save();

        return redirect()->route('discipline.index')->with('success', [
            'message' => 'Student discipline record add successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Discipline $discipline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discipline $discipline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Discipline $discipline)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discipline $discipline)
    {
        //
    }
}
