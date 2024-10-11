<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use App\Models\Classes;
use App\Models\AttendanceRecord;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = Attendance::all();
        return view('backend.teacher.attendance.list_attendance', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students =  Student::all();
        $classes = Classes::all();
        return view('backend.teacher.attendance.add_attendance',
        compact('students','classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_id' => 'required',
            'date' => 'required|date',
            'attendance' => 'required|array',
        ]);

        $class_id = $validated['class_id'];
        $date = $validated['date'];
        $attendance = $validated['attendance'];

        $total_students = count($attendance);
        $total_present = count(array_filter($attendance, fn($data) => strtolower($data['type']) === 'present'));
        $total_absent = count(array_filter($attendance, fn($data) => strtolower($data['type']) === 'absent'));
        $total_late = count(array_filter($attendance, fn($data) => strtolower($data['type']) === 'late'));


        // Create a new attendance record for the class on the specified date
        $attendances = Attendance::create([
            'class_id' => $class_id,
            'date' => $date,
            'total_students' => $total_students,
            'total_present' => $total_present,
            'total_absent' => $total_present,
            'total_late' =>  $total_late,
        ]);

        foreach ($attendance as $student_id => $data) {
            AttendanceRecord::create([ 
                'student_id' => $student_id,
                'attendance_id' => $attendances->id,
                'attendance_type' => $data['type'],
            ]);
        }

        return redirect()->route('attendance.index')->with('success', [
            'message' => 'Student attendance added successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }

    public function fetchStudents(Request $request)
    {
        $class_id = $request->class_id;

        // Fetch students for the selected class
        $students = Student::where('class_id', $class_id)->get();
        
        return view('backend.partials.student_list', compact('students'))->render();
    }
}
