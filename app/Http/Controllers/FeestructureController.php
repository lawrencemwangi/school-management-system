<?php

namespace App\Http\Controllers;

use App\Models\Feestructure;
use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeestructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fees = Feestructure::all();
        return view('backend.admin.fees.list_feestructure', compact('fees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $forms = Form::all();
        return view('backend.admin.fees.add_feestructure',compact('forms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fee_category' => 'required|array',
            'amount' => 'required|array',
            'amount.*' => 'required|numeric|min:1',
            'form_id' => 'required|string|exists:forms,id',
        ]);

        $feeCategories = [];

        foreach($request->fee_category as $index => $category){
            $feeCategories[] = [
                'category' => $category,
                'amount' => $request->amount[$index],
            ];
        }

        $feestructure =  new Feestructure;
        $feestructure->academic_year = $request->input('academic_year');
        $feestructure->form_id = $validated['form_id'];
        $feestructure->term = $request->input('term');
        $feestructure->fees_categories = json_encode($feeCategories);
        $feestructure->total_amount = array_sum(array_column($feeCategories, 'amount'));

        $feestructure->save();
        return redirect()->route('feestructure.index')->with('success',[
            'message' => 'Feestructure was added successfully',
            'duration' => $this->alert_message_duration,
        ]);


    }

    /**
     * Display the specified resource.
     */
    public function show(Feestructure $feestructure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feestructure $feestructure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feestructure $feestructure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feestructure $feestructure)
    {
        //
    }


    //to view the feesturcure 
    public function view_feestructure($id)
    {
        $feestructure = Feestructure::findOrFail($id);
        $feestructure->fees_categories = json_decode($feestructure->fees_categories, true);

        return view('backend.admin.fees.view_feestructure', compact('feestructure'));
    }

    //student view feestructure function
    public function Viewfeestructure()
    {
        $feeData = Feestructure::all();

        foreach ($feeData as $fee) {
            $fee->fees_categories = json_decode($fee->fees_categories, true); 
        }
    
        return view('backend.student.financials.feestructure',compact('feeData'));
    }
}
