<?php

namespace App\Http\Controllers\Admin;

use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreTravelRequest;
use App\Http\Requests\UpdateTravelRequest;
use App\Http\Controllers\Controller;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travels = Travel::all();
        return view('admin.travels.index', compact('travels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.travels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        
        $travel =new Travel();
        $travel->name = $request->name;
        $travel->description = $request->description;
        $travel->start_date = $request->start_date;
        $travel->end_date = $request->end_date;
        $travel->save();
        
            return redirect()->route('admin.travels.index');
     
       
    }

    
    /**
     * Display the specified resource.
     */
    public function show(Travel $travel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Travel $travel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTravelRequest $request, Travel $travel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Travel $travel)
    {
        //
    }
}
