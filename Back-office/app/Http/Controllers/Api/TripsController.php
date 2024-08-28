<?php

namespace App\Http\Controllers\Api;

use App\Functions\Helper;
use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Trip;
use DateTime;
use Illuminate\Http\Request;

class TripsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trips = Trip::all();
        return response()->json(compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // Definisci le regole di validazione con messaggi personalizzati
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Il nome del viaggio è obbligatorio.',
            'name.string' => 'Il nome del viaggio deve essere una stringa.',
            'name.max' => 'Il nome del viaggio non può superare i 255 caratteri.',
            'description.string' => 'La descrizione deve essere una stringa.',
            'start_date.required' => 'La data di inizio è obbligatoria.',
            'start_date.date' => 'La data di inizio deve essere una data valida.',
            'start_date.before' => 'La data di inizio deve essere prima della data di fine.',
            'end_date.required' => 'La data di fine è obbligatoria.',
            'end_date.date' => 'La data di fine deve essere una data valida.',
            'end_date.after' => 'La data di fine deve essere successiva alla data di inizio.',
            'image.image' => "Il file deve essere un'immagine.",
            'image.mimes' => "L'immagine deve essere in formato jpeg, png, jpg, o gif.",
            'image.max' => "L'immagine non può superare i 2MB di dimensione.",
        ]);

        // Se un'immagine è stata caricata, salvala e aggiorna il percorso nel validatedData
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $originalName = $image->getClientOriginalName();
            $imagePath = $image->storeAs('uploads', $originalName, 'public');
            $validatedData['image'] = $imagePath; // Aggiorna validatedData con il percorso dell'immagine
        }

        // Creazione del nuovo viaggio
        $new_trip = new Trip();
        $new_trip->fill($validatedData);
        $new_trip->slug = Helper::generateSlug($new_trip->name, Trip::class);
        $new_trip->save();

        // Calcola i giorni del viaggio
        $start_date = new DateTime($new_trip->start_date);
        $end_date = new DateTime($new_trip->end_date);
        $interval = $end_date->diff($start_date);
        $n_days = $interval->days + 1;

        // Crea le istanze dei giorni
        for ($i = 0; $i < $n_days; $i++) {
            $new_day = new Day();
            $new_day->trip_id = $new_trip->id;
            $new_day->date = date('Y-m-d', strtotime($new_trip->start_date . "+$i days"));
            $new_day->save();
        }

        return response()->json(compact('new_trip'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
