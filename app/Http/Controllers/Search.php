<?php

namespace App\Http\Controllers;

use App\Models\internships;
use App\Models\Localization;
use App\Models\userData;
use App\Models\companies;
use Illuminate\Http\Request;

class Search extends Controller
{
    public function offerCRUD(Request $request){
        $promo = ['A1', 'A2', 'A3','A4', 'A5'];

        $query = $request->input('OfferQuery'); 
        $offerByLocality = $request->input('offerByLocality'); 
        $offerByPromo = $request->input('offerByPromo'); 
        $offerByDuration = $request->input('offerByDuration'); 
        $offerByDate = $request->input('offerByDate'); 
        $offerBySA = $request->input('offerBySA'); 
        $offerByPlace = $request->input('offerByPlace'); 

        if($request->filled('OfferQuery')){
            $offer = internships::with('company')->where('title', 'like', "%" . $query . "%")
            ->orWhere('description', 'like', "%" . $query . "%")
            ->paginate(3);
        }elseif($request->filled('offerByPromo')){
            $offer = internships::with('company')->where(function($queryBuilder) use ($offerByPromo) {
                $queryBuilder->Where('promo', $offerByPromo);
            })->paginate(3);
        }elseif($offerByLocality && empty($offerByPromo) && empty($offerByDuration) && empty($offerByDate) && empty($offerBySA) && empty($offerByPlace) && empty($query)){
            //todo
        }elseif($request->filled('offerByDuration')){
            $offer = internships::with('company')->where(function($queryBuilder) use ($offerByDuration) {
                $queryBuilder->Where('duration' , 'like' , '%' .  $offerByDuration . '%');
            })->paginate(3);
        }elseif($request->filled('offerByDate')){
            $offer = internships::with('company')->where(function($queryBuilder) use ($offerByDate) {
                $queryBuilder->Where('date' , $offerByDate);
            })->paginate(3);
        }elseif($request->filled('offerBySA')){
            $offer = internships::with('company')->where(function($queryBuilder) use ($offerBySA) {
                $queryBuilder->Where('applies' , $offerBySA);
            })->paginate(3);
        }elseif($request->filled('offerByPlaces')){
            $offer = internships::with('company')->where(function($queryBuilder) use ($offerByPlace) {
                $queryBuilder->Where('places' , $offerByPlace);
            })->paginate(3);
        }

        return view ('admin.internships', compact('offer', 'promo'));
    }


    public function offers(Request $request){
        $data = ['LoggedUserInfo'=>userData::where('id','=', session('activeSession'))->first()];
        $promo = ['A1', 'A2', 'A3','A4', 'A5'];

        $query = $request->input('OfferQuery'); 
        $offerByLocality = $request->input('offerByLocality'); 
        $offerByPromo = $request->input('offerByPromo'); 
        $offerByDuration = $request->input('offerByDuration'); 
        $offerByDate = $request->input('offerByDate'); 
        $offerBySA = $request->input('offerBySA'); 
        $offerByPlace = $request->input('offerByPlace'); 

        if($request->filled('OfferQuery')){
            $internship = internships::with('company')->where('title', 'like', "%" . $query . "%")
            ->orWhere('description', 'like', "%" . $query . "%")
            ->paginate(3);
        }elseif($request->filled('offerByPromo')){
            $internship = internships::with('company')->where(function($queryBuilder) use ($offerByPromo) {
                $queryBuilder->Where('promo', $offerByPromo);
            })->paginate(3);
        }elseif($offerByLocality && empty($offerByPromo) && empty($offerByDuration) && empty($offerByDate) && empty($offerBySA) && empty($offerByPlace) && empty($query)){
            //todo
        }elseif($request->filled('offerByDuration')){
            $internship = internships::with('company')->where(function($queryBuilder) use ($offerByDuration) {
                $queryBuilder->Where('duration' , 'like' , '%' .  $offerByDuration . '%');
            })->paginate(3);
        }elseif($request->filled('offerByDate')){
            $internship = internships::with('company')->where(function($queryBuilder) use ($offerByDate) {
                $queryBuilder->Where('date' , $offerByDate);
            })->paginate(3);
        }elseif($request->filled('offerBySA')){
            $internship = internships::with('company')->where(function($queryBuilder) use ($offerBySA) {
                $queryBuilder->Where('applies' , $offerBySA);
            })->paginate(3);
        }elseif($request->filled('offerByPlaces')){
            $internship = internships::with('company')->where(function($queryBuilder) use ($offerByPlace) {
                $queryBuilder->Where('places' , $offerByPlace);
            })->paginate(3);
        }




        return view('internships', $data, compact('internship', 'promo'));
    }

    public function companies(Request $request){
        $data = ['LoggedUserInfo' => userData::where('id', session('activeSession'))->first()];
        $query = $request->input('companyQuery'); 
        $companyByLocality = $request->input('companyByLocality'); 

        
        if($request->filled('companyQuery')){
            $companyData = companies::with('rating')->where('company_name', 'like', "%" . $query . "%")
            ->orWhere('description', 'like', "%" . $query . "%")
            ->orWhere('field_of_work', 'like', "%" . $query . "%")->paginate(3);
        }elseif($request->filled('companyByLocality')){
            $companyData = companies::with('rating')
                                    ->whereHas('Localization', function($query) use ($companyByLocality) {
                                    $query->where('country', 'like', "%" . $companyByLocality . "%")
                                    ->orWhere('city', 'like', "%" . $companyByLocality . "%")
                                    ->orWhere('street', 'like', "%" . $companyByLocality . "%");
    })
    ->paginate(3);
        }


        return view('companies', $data, compact('companyData'));
        }

        public function student(Request $request){
            $promo = ['A1', 'A2', 'A3','A4', 'A5'];

            $query = $request->input('studentQuery'); 
            $studentByPromo = $request->input('studentByPromo'); 
            $studentByCenter = $request->input('studentByCenter'); 

            if(empty($studentByPromo) && empty($studentByCenter) && $query){
                $students = userData::where('UserRole', 'student')
                ->where(function($queryBuilder) use ($query) {
                    $queryBuilder->where('fullName', 'like', "%" . $query . "%")
                                 ->orWhere('user', 'like', "%" . $query . "%");
                })->paginate(5);
            }elseif($studentByPromo && empty($query) && empty($studentByCenter)){
                $students = userData::where('UserRole', 'student')
                ->where(function($queryBuilder) use ($studentByPromo) {
                    $queryBuilder->Where('Promotion', $studentByPromo);
                })->paginate(5);
            }elseif($studentByCenter && empty($studentByPromo) && empty($query)){

                $students = userData::where('UserRole', 'student')
                ->where(function($queryBuilder) use ($studentByCenter) {
                    $queryBuilder->where('StudyCenter', 'like', "%" . $studentByCenter . "%");
                })->paginate(5);

            }elseif($query && $studentByPromo && $studentByCenter){
                $students = userData::where('UserRole', 'student')
                ->where(function($queryBuilder) use ($query, $studentByPromo, $studentByCenter) {
                    $queryBuilder->where('fullName', 'like', "%" . $query . "%")
                                 ->where('Promotion', $studentByPromo)
                                 ->where('StudyCenter', 'like', "%" . $studentByCenter . "%");
                })->paginate(5);
            }elseif($query && $studentByPromo){
                $students = userData::where('UserRole', 'student')
                ->where(function($queryBuilder) use ($query, $studentByPromo) {
                    $queryBuilder->where('fullName', 'like', "%" . $query . "%")
                                 ->where('Promotion', $studentByPromo);
                })->paginate(5);
            }elseif($query && $studentByCenter){
                $students = userData::where('UserRole', 'student')
                ->where(function($queryBuilder) use ($query, $studentByCenter) {
                    $queryBuilder->where('fullName', 'like', "%" . $query . "%")
                                 ->where('StudyCenter', 'like', "%" . $studentByCenter . "%");
                })->paginate(5);
            }
    
            return view ('admin.students', compact('promo', 'students'));
            }



            public function pilotes(Request $request){
                $promo = ['A1', 'A2', 'A3','A4', 'A5'];
    
                $query = $request->input('piloteQuery'); 
                $piloteByPromo = $request->input('piloteByPromo'); 
                $piloteByCenter = $request->input('piloteByCenter'); 
    
                if($piloteByPromo && empty($query) && empty($piloteByCenter)){
                    $pilote = userData::where('UserRole', 'pilote')
                    ->where(function($queryBuilder) use ($piloteByPromo) {
                        $queryBuilder->Where('Promotion', $piloteByPromo);
                    })->paginate(5);
                }elseif($query && empty($piloteByPromo) && empty($piloteByCenter)){
                    $pilote = userData::where('UserRole', 'pilote')
                    ->where(function($queryBuilder) use ($query) {
                        $queryBuilder->where('fullName', 'like', "%" . $query . "%")
                                     ->orWhere('user', 'like', "%" . $query . "%");
                    })->paginate(5);
                }elseif($piloteByCenter && empty($piloteByPromo) && empty($query)){
    
                    $pilote = userData::where('UserRole', 'pilote')
                    ->where(function($queryBuilder) use ($piloteByCenter) {
                        $queryBuilder->where('StudyCenter', 'like', "%" . $piloteByCenter . "%");
                    })->paginate(5);
    
                }elseif($query && $piloteByPromo){
                    $pilote = userData::where('UserRole', 'pilote')
                    ->where(function($queryBuilder) use ($query, $piloteByPromo) {
                        $queryBuilder->where('fullName', 'like', "%" . $query . "%")
                                     ->where('Promotion', $piloteByPromo);
                    })->paginate(5);
                }elseif($query && $piloteByCenter){
                    $pilote = userData::where('UserRole', 'pilote')
                    ->where(function($queryBuilder) use ($query, $piloteByCenter) {
                        $queryBuilder->where('fullName', 'like', "%" . $query . "%")
                                     ->where('StudyCenter', 'like', "%" . $piloteByCenter . "%");
                    })->paginate(5);
                }
        
                return view ('admin.pilots', compact('promo', 'pilote'));
                }


                public function companyCRUD(Request $request){

                    $query = $request->input('companyQuery'); 
                    $companyByLocality = $request->input('companyByLocality'); 
            
                    
                    if($request->filled('companyQuery')){
                        $company = companies::with('rating')->where('company_name', 'like', "%" . $query . "%")
                        ->orWhere('description', 'like', "%" . $query . "%")
                        ->orWhere('field_of_work', 'like', "%" . $query . "%")->paginate(3);
                    }elseif($request->filled('companyByLocality')){
                        $company = companies::with('rating')
                                                ->whereHas('Localization', function($query) use ($companyByLocality) {
                                                $query->where('country', 'like', "%" . $companyByLocality . "%")
                                                ->orWhere('city', 'like', "%" . $companyByLocality . "%")
                                                ->orWhere('street', 'like', "%" . $companyByLocality . "%");
                                                })->paginate(3);
                    }
                        return view ('admin.companies', compact('company'));
                    }



            
}
