<?php

namespace App\Http\Controllers;

use App\Models\rating;


use Illuminate\Http\Request;

class ratings extends Controller
{
    public function add(Request $request, $id){
        $rating_note = $request->input('product_rating');
        $studentID = $request->session()->get('activeSession');
        $companyID = $id;

        $existingRating = rating::where('student_id', $studentID)
        ->where('company_id', $companyID)
        ->first();

        if($existingRating){
            $existingRating->rating = $rating_note;
            $existingRating->save();
        }else{
            $rating = new rating();
            $rating->student_id = $studentID;
            $rating->company_id = $companyID;
            $rating->rating = $rating_note;
            $rating->save();
        }
        return redirect()->back()->with('success', 'Thank you for rating this company');
    }
}
