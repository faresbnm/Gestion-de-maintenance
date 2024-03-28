<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class companySearch extends Controller
{
    public function search(){
        $data = ['LoggedUserInfo' => userData::where('id', session('activeSession'))->first()];
        $querydata = $_GET('companySearch');
        $companyData = internships::where('title', 'like', "%$querydata%")
            ->orWhere('description', 'like', "%$querydata%")
            ->paginate(3);       

        return view('companies', $data, compact('companyData'));
    }
}
