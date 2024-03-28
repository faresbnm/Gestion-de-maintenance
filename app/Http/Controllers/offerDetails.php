<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\internships;
use App\Models\userData;

class offerDetails extends Controller
{
    public function show(Request $request, $id)
    {
        $offer = internships::with('company.Localization')->findOrFail($id);
        $userId = $request->session()->get('activeSession');
        $userDisplayData = userData::find($userId);
        return view('offerDetails', compact('offer','userDisplayData' ));
    }
}
