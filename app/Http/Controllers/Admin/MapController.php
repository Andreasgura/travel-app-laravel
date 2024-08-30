<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Travel;

class MapController extends Controller
{
    public function showMap (Request $request, Travel $travel) {
        
       return view('admin.map.index', compact('travel'));
    }
}
