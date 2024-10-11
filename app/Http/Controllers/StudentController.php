<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\Parents;
use App\Models\Classes;
use App\Models\Dorm;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('backend.admin.students.list_students', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $parents = Parents::all();
        $classes = Classes::all();
        $dorms = Dorm::all();
        return view('backend.admin.students.add_student', 
        compact('users','parents','classes','dorms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'registration_number' => 'required|string',
            'year_admitted' => 'required|date',
            'dob' => 'required|date',
            'user_id' => 'required|string|exists:users,id',
            'parent_id' => 'required|string|exists:parents,id',
            'dorm_id' => 'required|string|exists:dorms,id',
            'class_id' => 'required|string|exists:classes,id',
            'graduation_date' => 'required|date',
            'graduation_status' => 'required|in:0,1',
            'user_level' => 'required|in:0,1,2,3,4,5',
        ]);

        $users = User::find($validated['user_id']);

        if($users){
            $users->user_level = $validated['user_level'];
            $users->save();
        }

        $student = new Student;
        $student->user_id = $users->id;
        $student->registration_number = $validated['registration_number'];
        $student->year_admitted = $validated['year_admitted'];
        $student->dob = $validated['dob'];
        $student->parent_id = $validated['parent_id'];
        $student->dorm_id = $validated['dorm_id'];
        $student->class_id = $validated['class_id'];
        $student->graduation_date = $validated['graduation_date'];
        $student->graduation_status = $validated['graduation_status'];
        $student->save();

        return redirect()->route('students.index')->with('success', [
            'message' => 'Student added successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $students = Student::all();
        return view('backend.teacher.students.show_students', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $users = User::all();
        $parents = Parents::all();
        $classes = Classes::all();
        $dorms = Dorm::all();
        return view('backend.admin.students.update_student',
         compact('student','users','parents','classes','dorms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'registration_number' => 'required|string',
            'year_admitted' => 'required|date',
            'dob' => 'required|date',
            'user_id' => 'required|string|exists:users,id',
            'parent_id' => 'required|string|exists:parents,id',
            'dorm_id' => 'required|string|exists:dorms,id',
            'class_id' => 'required|string|exists:classes,id',
            'graduation_date' => 'required|date',
            'graduation_status' => 'required|in:0,1',
            'user_level' => 'required|in:0,1,2,3,4,5',
        ]);

        $users = User::find($validated['user_id']);

        if($users){
            $users->user_level = $validated['user_level'];
            $users->save();
        }

        $student->user_id = $users->id;
        $student->registration_number = $validated['registration_number'];
        $student->year_admitted = $validated['year_admitted'];
        $student->dob = $validated['dob'];
        $student->parent_id = $validated['parent_id'];
        $student->dorm_id = $validated['dorm_id'];
        $student->class_id = $validated['class_id'];
        $student->graduation_date = $validated['graduation_date'];
        $student->graduation_status = $validated['graduation_status'];

        $student->update();

        return redirect()->route('students.index')->with('success', [
            'message' => 'Student updated successfully',
            'duration' => $this->alert_message_duration,
        ]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }

    public function show_Student($student)
    {
        $students = Student::with('parent.user')->findOrFail($student);
        return view('backend.teacher.students.view_student',compact('students'));
    }
}
