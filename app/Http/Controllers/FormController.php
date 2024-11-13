<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $school_forms = Form::all();
        return view('backend.admin.form.list_form', compact('school_forms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.form.add_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $forms = new Form;
       $forms->form_name = $request->input('form_name');
       $forms->save();

       return redirect()->route('forms.index')->with('success', [
            'message' => 'Form added successfully',
            'duration' => $this->alert_message_duration,
       ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Form $form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Form $form)
    {
        return view('backend.admin.form.update_form' , compact('form'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Form $form)
    {
        $validated = $request->validate([
            'form_name' => 'required|string',
        ]);

        $form->form_name = $validated['form_name'];

        $form->update();

        return redirect()->route('forms.index')->with('success', [
            'message' => 'Form Updated successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Form $form)
    {
        $form->delete();

        return redirect()->route('forms.index')->with('success', [
            'message' => 'Form deleted successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }
}
