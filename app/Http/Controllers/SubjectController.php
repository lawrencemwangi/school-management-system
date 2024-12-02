<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $count_subjects = Subject::count();
        $subjects = Subject::all();
        return view('backend.admin.subjects.list_subject', compact('subjects','count_subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.subjects.add_subject');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject_name' => 'required|string',
            'subject_code' => 'required|string',
            
        ]);

        $subject = new Subject;
        $subject->subject_name = $validated['subject_name'];
        $subject->subject_code = $validated['subject_code'];
        $subject->description = $request->input('description');
        $subject->save();

        return redirect()->route('subject.index')->with('success', [
            'message' => 'Subject add successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        return view('backend.admin.subjects.update_subject', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $validated = $request->validate([
            'subject_name' => 'required|string',
            'subject_code' => 'required|string',
        ]);

        $subject->subject_name = $validated['subject_name'];
        $subject->subject_code = $validated['subject_code']; 
        $subject->subject_name = $request->input('subject_name');
        $subject->update();

        return redirect()->route('subject.index')->with('success', [
            'message' => 'Subject updated successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subject.index')->with('success', [
            'message' => 'Subject deleted successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }
}
