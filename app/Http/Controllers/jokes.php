<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class jokes extends Controller
{
    public function show(){
        return view('api');
    }
}
