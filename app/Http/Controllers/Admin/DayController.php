<?php

namespace App\Http\Controllers\Admin;

use App\Models\Day;
use App\Http\Controllers\Controller;
use App\Models\Travel;
use Illuminate\Http\Request;

class DayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $days = Day::all();
        return view('admin.days.index', compact('days'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Travel $travel)
    {
        return view('admin.days.create', compact('travel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Travel $travel)
    {
        $day = new Day();
        $day->day_number = $request->day_number;
        $day->description = $request->description;
        $day->travel_id = $travel->id;
        $day->save();
        return redirect()->route('admin.travels.show', $travel->id);        
    }

    /**
     * Display the specified resource.
     */
    public function show(Day $day)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Travel $travel, Day $day)
    {
        return view('admin.days.edit', compact('travel', 'day'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Travel $travel, Day $day, )
    {
        $validated = $request->validate([
            'day_number' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $day->update($validated);

        return redirect()->route('admin.travels.show', $travel->id)
                         ->with('message', 'Giorno ' . $day->day_number . ' aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Day $day)
    {
        //
    }
}
