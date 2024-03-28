<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\companies;
use App\Models\Localization;
use App\Models\internships;
use App\Models\rating;

class companyDetails extends Controller
{
    public function show(Request $request, $id){
        $studentID =  $request->session()->get('activeSession');

        $companyData = companies::findOrFail($id);
        $local = Localization::where('companies_id', $id)->get();
        $internships = internships::where('company_id', $id)->get();
        $internshipsCount = $internships->count();


        $StudentRating = rating::where('student_id', $studentID)
        ->where('company_id', $id)
        ->first();

        $rating = rating::where('company_id', $id)->get();

        $ratingSum =  rating::where('company_id', $id)->sum('rating');
        if($rating->count() > 0){
            $ratingResult = $ratingSum/$rating->count();
        }else{
            $ratingResult = 'No ratings yet';
        }
        return view('companyDetails', compact('companyData', 'local', 'internships', 'internshipsCount', 'rating', 'ratingResult', 'StudentRating'));
    }
}
