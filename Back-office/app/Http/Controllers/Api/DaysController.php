<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Trip;
use Illuminate\Http\Request;


class DaysController extends Controller
{
    public function dayDetail($slug, $date){
        $getTrip = Trip::where('slug', $slug)->with('days')->first();
        $getDay = $getTrip->days->firstWhere('date', $date);
        return response()->json(compact('getDay'));
    }
}
