<?php

namespace App\Http\Controllers;

use App\Models\Feestructure;
use Illuminate\Http\Request;

class FeestructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.admin.fees.list_feestructure');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.fees.add_feestructure');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
}
