<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userData;
use App\Models\internships;
use App\Models\companies;
use App\Models\wishlist;
use App\Models\rating;


use Illuminate\Support\Facades\Hash;
use Session;

class customAuth extends Controller
{
    function check(Request $request){
        //Validate requests
        $request->validate([
             'user'=>'required',
             'password'=>'required|min:5|max:12'
        ]);

        $userInfo = userData::where('user','=', $request->user)->first();

        if ($userInfo && $userInfo->password === $request->password) {
            $request->session()->put('activeSession', $userInfo->id);
            return redirect()->intended('home');
        } else {
            return back()->with('fail', 'check username or password');
        }
    }

    function logout(){
        if(session()->has('activeSession')){
            session()->pull('activeSession');
            return redirect('/');
        }
    }

    function login(){
        return view('login.login');
    }

    function home(){
        $data = ['LoggedUserInfo'=>userData::where('id','=', session('activeSession'))->first()];
        return view('home', $data);
    }

    function internships(){
        $data = ['LoggedUserInfo'=>userData::where('id','=', session('activeSession'))->first()];
        $internship = internships::with('company')->paginate(3);
        $promo = ['A1', 'A2', 'A3','A4', 'A5'];
        return view('internships', $data, compact('internship', 'promo'));
    }

    function companies(){
        $data = ['LoggedUserInfo' => userData::where('id', session('activeSession'))->first()];
        $companyData = companies::with('rating')->paginate(3);

        return view('companies', $data, compact('companyData'));
    }

    function account(Request $request){
        $data = ['LoggedUserInfo'=>userData::where('id','=', session('activeSession'))->first()];
        $userId = $request->session()->get('activeSession');
        $userDisplayData = userData::find($userId);

        $wishlistItems = wishlist::with('offer')->where('student_id', $userId)->get();

        return view('account', $data, compact('userDisplayData', 'wishlistItems'));
    }
}
