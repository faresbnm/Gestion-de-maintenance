<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\userData;
use App\Models\Application;
use App\Models\wishlist;
 
class UserCRUD extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        $students = userData::where('UserRole', 'student')->paginate(5);
        $promo = ['A1', 'A2', 'A3','A4', 'A5'];
        return view ('admin.students', compact('promo', 'students'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createUser');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new userData();
        $student->fullName = $request->input('fullname');
        $student->user = $request->input('username');
        $student->password = $request->input('password');
        $student->StudyCenter = $request->input('studycenter');
        $student->Promotion = $request->input('promotion');
        $student->UserRole = $request->input('ur');
        // Set other properties as needed
        $student->save();
    
        return redirect('admin/student')->with('flash_message', 'user created');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = userData::find($id);
        $applications = Application::with('offer')->where('student_id', $id)->get();
        $wishlistItems = wishlist::with('offer')->where('student_id', $id)->get();

        return view('admin.showStudent', compact('student', 'applications', 'wishlistItems'));
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = userData::find($id);
        $promo = ['A1', 'A2', 'A3','A4', 'A5'];
        return view('admin.editUser')->with(compact('students', 'promo'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = userData::findOrFail($id);
        $student->fullName = $request->input('fullname');
        $student->user = $request->input('username');
        $student->password = $request->input('password');
        $student->StudyCenter = $request->input('studycenter');
        $student->Promotion = $request->input('promotion');
        $student->UserRole = $request->input('ur');        
        $student->save();
        return redirect('admin/student')->with('flash_message', 'student Updated!');  
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        userData::destroy($id);
        return redirect('admin/student')->with('flash_message', 'Student deleted!');  
    }
}