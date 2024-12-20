<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\Parents;
use App\Models\Classes;
use App\Models\Dorm;
use App\Models\Form;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Feestructure;
use App\Models\Discipline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        $forms = Form::all();
        $subjects = Subject::all();
        return view('backend.admin.students.add_student', 
        compact('users','parents','classes','dorms', 'forms', 'subjects'));
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
            'form_id' => 'required|string|exists:forms,id',
            'class_id' => 'required|string|exists:classes,id',
            'graduation_date' => 'required|date',
            'graduation_status' => 'required|in:0,1',
            'user_level' => 'required|in:0,1,2,3,4,5',
            'subjects' => 'required|array',
            'subjects.*' => 'required|exists:subjects,id',
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
        $student->form_id = $validated['form_id'];
        $student->class_id = $validated['class_id'];
        $student->graduation_date = $validated['graduation_date'];
        $student->graduation_status = $validated['graduation_status'];
        $student->subjects = json_encode($validated['subjects']);

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
        $count_students = Student::all()->count();
        return view('backend.teacher.students.show_students', compact('students', 'count_students'));
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
        $forms = Form::all();
        $subjects = Subject::all();
        $selectedSubjects = json_decode($student->subjects, true) ?? []; 
        return view('backend.admin.students.update_student',
         compact('student','users','parents','classes','dorms','forms','subjects','selectedSubjects'));
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
            'form_id' => 'required|string|exists:forms,id',
            'class_id' => 'required|string|exists:classes,id',
            'graduation_date' => 'required|date',
            'graduation_status' => 'required|in:0,1',
            'user_level' => 'required|in:0,1,2,3,4,5',
            'subjects' => 'required|array',
            'subjects.*' => 'required|exists:subjects,id',
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
        $student->dorm_id = $validated['dorm_id'];
        $student->form_id = $validated['form_id'];
        $student->graduation_date = $validated['graduation_date'];
        $student->graduation_status = $validated['graduation_status'];
        $student->subjects = json_encode($validated['subjects'] ?? []);

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

    //those student inofrmation in the teachers view
    public function show_Student($student)
    {
        $students = Student::with('parent.user')->findOrFail($student);
        return view('backend.teacher.students.view_student',compact('students'));
    }

    
    // Show the students details 
    public function show_details()
    {
        $students = Student::with('parent.user')->firstOrFail();
        $subjectIds = json_decode($students->subjects, true) ?? []; 
        $subjects = Subject::whereIn('id', $subjectIds)->pluck('subject_name')->toArray();       
        return view('backend.student.view_details',compact('students', 'subjects'));
    }

    public function ShowTeachers()
    {
        $teachers = Teacher::all();
        return view('backend.student.teachers.show_teachers',compact('teachers'));
    }

    public function ShowDiscipline()
    {
        $user = auth()->user();
        // dd($user);
        $disciplines = Discipline::where('student_id', $user->student->id)->get();
        // dd($disciplines);
        return view('backend.student.discipline.show_discipline', compact('disciplines'));
    }
}
