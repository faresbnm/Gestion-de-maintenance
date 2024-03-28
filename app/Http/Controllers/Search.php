<?php

namespace App\Http\Controllers;

use App\Models\internships;
use App\Models\userData;
use App\Models\companies;
use Illuminate\Http\Request;

class Search extends Controller
{
    public function offers(Request $request){
        $data = ['LoggedUserInfo'=>userData::where('id','=', session('activeSession'))->first()];
        $query = $request->input('OfferQuery'); 
        $internship = internships::with('company')->where('title', 'like', "%" . $query . "%")
        ->orWhere('description', 'like', "%" . $query . "%")
        ->paginate(3);
        return view('internships', $data, compact('internship'));
    }

    public function companies(Request $request){
        $data = ['LoggedUserInfo' => userData::where('id', session('activeSession'))->first()];
        $query = $request->input('companyQuery'); 
        $companyData = companies::with('rating')->where('company_name', 'like', "%" . $query . "%")
        ->orWhere('description', 'like', "%" . $query . "%")->paginate(3);

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



            
}
