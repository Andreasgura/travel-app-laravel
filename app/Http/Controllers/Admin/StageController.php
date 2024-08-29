<?php

namespace App\Http\Controllers\Admin;

use App\Models\Stage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Travel;
use App\Models\Day;
use Illuminate\Support\Facades\Http;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Travel $travel, Day $day)
    {
        return view('admin.stages.create', compact('travel', 'day'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Travel $travel, Day $day)
    {
        // chiamo il metodo per ottenere le coordinate
        $geocodes = $this->getGeocode($request->address);
        // Controllo se le coordinate sono valide
        if (!$geocodes) {
            return back()->with('error', 'Indirizzo non valido, inserire un indirizzo corretto.');
        }
   
        $new_stage = new Stage();
        $new_stage->name = $request->name;
        $new_stage->address = $request->address;
        $new_stage->lat = $geocodes['lat'];
        $new_stage->long = $geocodes['lng'];
        $new_stage->day_id = $day->id;
        $new_stage->start_time = $request->start_time;
        $new_stage->end_time = $request->end_time;
        $new_stage->note = $request->note;
        $new_stage->image = $request->image;
        $new_stage->rate = $request->rate;
        $new_stage->save();
        return redirect()->route('admin.travels.show', $travel->id)
            ->with('message', 'Tappa ' . $new_stage->name . ' creata con successo!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Stage $stage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stage $stage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Stage $stage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stage $stage)
    {
        //
    }

    public function getGeocode($address)
    {
        // Chiamata API 
        $apiKey = config('services.openchangedata.api_key');
        $response = Http::withOptions(['verify' => false])->get('https://api.opencagedata.com/geocode/v1/json', [
            'q' => $address,
            'key' => $apiKey,
        ]);
        $data = $response->json();
        //se ci sono risultati ritorna un array con chiavi lat e lng
        if ($data['status']['code'] === 200 && !empty($data['results'])) {
            $location = $data['results'][0]['geometry'];
            return ['lat' => $location['lat'], 'lng' => $location['lng']];
        }

        //se ci sono errori ritorna null
        return null;
    }
}
