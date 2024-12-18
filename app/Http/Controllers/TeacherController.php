<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use App\Models\Subject;
use App\Models\Classes;
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
        $subjects = Subject::all();
        $classes = Classes::all();
        return  view('backend.admin.teachers.add_teacher', compact('users','subjects','classes'));
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'emp_code' => 'required|string|max:10',
            'user_id' => 'required|exists:users,id', 
            'emp_date' => 'required|date',
            'status' => 'required|in:0,1',
            'user_level' => 'required|in:0,1,2,3,4,5',
            'class_id' => 'nullable|exists:classes,id',
            'subjects' => 'required|array',
            'subjects.*' => 'required|exists:subjects,id',
        ]);

        $user = User::find($validated['user_id']);

        if($user){
            $user->user_level = $validated['user_level'];
            $user->status = $validated['status'];
            $user->save();
        }

        $teacher = new Teacher([
            'emp_code' => $validated['emp_code'],
            'emp_date' => $validated['emp_date'],
            'user_id' => $validated['user_id'],
            'class_id' => $validated['class_id'],
            'subjects' => json_encode($validated['subjects']),
        ]);

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
        $users = User::all();
        $subjects = Subject::all();
        $classes = Classes::all();
        $teacherSubjects = $teacher->subjects ?? [];
        // dd($teacherSubjects);  

        return view('backend.admin.teachers.update_teacher', 
        compact(
            'teacher',
            'users',
            'subjects',
            'classes',
            'teacherSubjects',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'subjects' => 'required|array',
            'subjects.*' => 'required|exists:subjects,id',
            'emp_code' => 'required|string|max:10',
            'user_id' => 'required|exists:users,id', 
            'emp_date' => 'required|date',
            'user_level' => 'required|in:0,1,2,3,4,5',
            'status' => 'required|in:0,1',
            'class_id' => 'nullable|exists:classes,id',
        ]);

        $users = User::find($validated['user_id']);

        if($users){
            $users->user_level = $validated['user_level'];
            $users->status = $validated['status'];
            $users->save();
        }

        $teacher->emp_code = $validated['emp_code'];
        $teacher->user_id = $validated['user_id'];
        $teacher->emp_date = $validated['emp_date'];
        $teacher->class_id = $validated['class_id'];
        $teacher->subjects = $request->input('subjects', []);
        $teacher->update();

        return redirect()->route('teachers.index')->with('success', [
            'message'  => 'Teacher details updated successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success',[
            'message' => 'Teacher deleted Successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }
}
