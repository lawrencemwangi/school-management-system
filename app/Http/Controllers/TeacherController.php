<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('backend.admin.teachers.list_teachers',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return  view('backend.admin.teachers.add_teacher', compact('users'));
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'emp_code' => 'required|string|max:10',
            'emp_date' => 'required|date',
        ]);

        $teacher = new Teacher;
        $teacher->user_id = $request->input('user_id');
        $teacher->emp_code = $validated['emp_code'];
        $teacher->emp_date = $validated['emp_date'];

        $teacher->save();

        return redirect()->route('teachers.index')->with('success', [
            'message' => 'Teacher added successfully',
            'duration' =>$this->alert_message_duration,
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
