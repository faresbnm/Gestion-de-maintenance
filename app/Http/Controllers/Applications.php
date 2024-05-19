<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App\Models\internships;
use App\Models\Application;
use Illuminate\Http\Request;

class Applications extends Controller
{
    public function showApply($id)
    {
        $offer = internships::with('company.Localization')->findOrFail($id);
        return view('Application', compact('offer'));
    }

    public function store(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'CV' => 'required|file|mimes:doc,docx,pdf,ppt,pptx|max:8048', // Adjust max file size as needed
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'incorrect file format or file size is not allowed');
        }
    

        $studentId = $request->session()->get('activeSession');

        // Check if the student has already applied for the offer
        $existingApplication = Application::where('student_id', $studentId)
                                     ->where('offer_id', $id)
                                     ->exists();
                                     
    
        if ($existingApplication) {
            // If the student has already applied, provide feedback (e.g., flash message) and redirect back
            return redirect()->back()->with('error', 'You have already applied for this offer.');
        }

        if($request->has('CV')){

            $file = $request->file('CV');
            $extension = $file->getClientOriginalExtension();

            $filename = $studentId.'_'.$id.'.'.$extension;

            $path = 'assets/Uploads/cvs/';
            $file->move($path, $filename);
        }
    
        // If the student hasn't applied before, create a new application record
        $application = new Application();
        $application->student_id = $studentId;
        $application->offer_id = $id;
        $application->email = $request->input('email');
        $application->motivation_letter = $request->input('motivationLetter');
        $application->cv = $path.$filename;
        $application->save();
    
        return redirect()->route('offer.show', $id)->with('success', 'Your application has been submitted successfully.');
    }
}
