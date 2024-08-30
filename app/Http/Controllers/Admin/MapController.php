<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Day;
use Illuminate\Http\Request;
use App\Models\Travel;

class MapController extends Controller
{
    public function showMap (Request $request, Day $day) {
        
       return view('admin.map.index', compact('day'));
    }
}
