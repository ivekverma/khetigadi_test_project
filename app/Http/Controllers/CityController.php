<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function getCities(request $request)
    {
        $cities = City::select('id', 'name')->where('state_id', $request->state_id)->get();
        return response()->json($cities);
    }
}
