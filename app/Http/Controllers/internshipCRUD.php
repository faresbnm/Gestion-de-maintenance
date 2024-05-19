<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\internships;
use App\Models\companies;
use App\Models\userData;

use Illuminate\Support\Facades\File;



class internshipCRUD extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offer = internships::all();
        $promo = ['A1', 'A2', 'A3','A4', 'A5'];

        return view ('admin.internships', compact('offer', 'promo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companyOffer = companies::all();
        return view('admin.createOffer', compact('companyOffer'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'assets/Uploads/Internships/';
            $file->move($path, $filename);
        }

        $offer = new internships();
        $offer->title = $request->input('title');
        $offer->description = $request->input('description');
        $offer->competences = $request->input('skills');
        $offer->promo = $request->input('promo');
        $offer->duration = $request->input('duration');
        $offer->base_remuneration = $request->input('salary');
        $offer->date = $request->input('date');
        $offer->places = $request->input('places');
        $offer->applies = $request->input('applies');
        $offer->company_id = $request->input('company_id');
        $offer->descriptive_image = $path.$filename;
        // Set other properties as needed
        $offer->save();
    
        return redirect('admin/internship')->with('flash_message', 'Offer created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        $offer = internships::with('company.Localization')->findOrFail($id);
        $userId = $request->session()->get('activeSession');
        $userDisplayData = userData::find($userId);
        return view('offerDetails', compact('offer','userDisplayData' ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $companies = companies::all();
        $offer = internships::find($id);
        $promo = ['A1', 'A2', 'A3','A4', 'A5'];
        return view('admin.editOffer')->with(compact('companies','offer', 'promo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $offer = internships::findOrFail($id);

        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'assets/Uploads/Internships/';
            $file->move($path, $filename);

            if(File::exists($offer->descriptive_image)){
                File::delete($offer->descriptive_image);
            }
        }



        $offer->title = $request->input('title');
        $offer->description = $request->input('description');
        $offer->competences = $request->input('skills');
        $offer->promo = $request->input('promo');
        $offer->duration = $request->input('duration');
        $offer->base_remuneration = $request->input('salary');
        $offer->date = $request->input('date');
        $offer->places = $request->input('places');
        $offer->applies = $request->input('applies');
        $offer->company_id = $request->input('company_id');
        $offer->descriptive_image = $path.$filename;
        // Set other properties as needed
        $offer->save();
    
        return redirect('admin.internship')->with('flash_message', 'Offer Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        internships::destroy($id);
        return redirect('admin/internship')->with('flash_message', 'Offer deleted!');  
    }
}
