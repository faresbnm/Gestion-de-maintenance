<?php

namespace App\Http\Controllers;
use App\Models\userData;


use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function show(Request $request){
        $userId = $request->session()->get('activeSession');
        $userDisplayData = userData::find($userId);        
        return view('admin.dashboard', compact('userDisplayData'));
    }
}
