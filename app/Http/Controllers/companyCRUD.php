<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\companies;
use App\Models\Localization;

use Illuminate\Support\Facades\File;



class companyCRUD extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = companies::with('Localization')->paginate(5);
        
        return view ('admin.companies', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createCompany');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->has('logo')){

            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'assets/Uploads/companies/';
            $file->move($path, $filename);
        }

        $company = new companies();
        $company->company_name = $request->input('companyName');
        $company->description = $request->input('company_description');
        $company->company_logo = $path.$filename;
        $company->field_of_work = $request->input('proffession');
        $company->save();


        $local = new Localization();
        $companyID = $company->id;
        $local->companies_id  = $companyID;
        $local->country = $request->input('companyCountry');
        $local->city = $request->input('companyCity');
        $local->street = $request->input('companyStreet');
        $local->building_number = $request->input('companyBuilding');
        $local->door_number = $request->input('companyDoor');
        $local->save();
    
        return redirect('admin/company')->with('flash_message', 'Company created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = companies::find($id);
        $local = Localization::where('companies_id', $id)->first();
        return view('admin.editCompany')->with(compact('company','local'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $company = companies::findOrFail($id);
        if($request->has('logo')){

            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'assets/Uploads/companies/';
            $file->move($path, $filename);

            if(File::exists($company->company_logo)){
                File::delete($company->company_logo);
            }
        }


        $company->company_name = $request->input('companyName');
        $company->description = $request->input('company_description');
        $company->company_logo = $path.$filename;
        $company->field_of_work = $request->input('proffession');
        $company->save();


        $companyID = $company->id;

        $local = Localization::where('companies_id', $id)->first();
        $local->companies_id  = $companyID;
        $local->country = $request->input('companyCountry');
        $local->city = $request->input('companyCity');
        $local->street = $request->input('companyStreet');
        $local->building_number = $request->input('companyBuilding');
        $local->door_number = $request->input('companyDoor');
        $local->save();
    
        return redirect('admin/company')->with('flash_message', 'Company updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        companies::destroy($id);
        return redirect('admin/company')->with('flash_message', 'Company deleted!');  
    }
}
