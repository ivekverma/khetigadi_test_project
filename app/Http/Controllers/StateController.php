<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller
{
    public function getStates(request $request)
    {
        $states = State::select('id', 'name')->where('country_id', $request->country_id)->get();
        return response()->json($states);
    }
}
