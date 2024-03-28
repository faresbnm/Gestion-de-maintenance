<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customAuth;
use App\Http\Controllers\offerDetails;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Applications;
use App\Http\Controllers\wishlists;
use App\Http\Controllers\companyDetails;
use App\Http\Controllers\ratings;
use App\Http\Controllers\Search;
use App\Http\Controllers\companySearch;


use App\Http\Controllers\UserCRUD;
use App\Http\Controllers\piloteCRUD;
use App\Http\Controllers\internshipCRUD;
use App\Http\Controllers\companyCRUD;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



//check user authentication and logout routes
Route::post('/auth/check',[customAuth::class, 'check'])->name('auth.check');
Route::get('/auth/logout',[customAuth::class, 'logout'])->name('auth.logout');

Route::group(['middleware'=>['AuthCheck']], function(){
    //default page route
    Route::get('/',[customAuth::class, 'login']);

    //home and account
    Route::get('/home',[customAuth::class, 'home']);
    Route::get('/account',[customAuth::class,'account']);

    //company routes
    Route::get('/companies',[customAuth::class,'companies']);
    Route::get('/companies/search',[Search::class,'companies'])->name('companySearch');;
    Route::get('/company/{id}', [companyDetails::class,'show'])->name('companyDetails');
    Route::post('/company/{id}/rating', [ratings::class,'add'])->name('companyRating');

    //internships routes
    Route::get('/internships',[customAuth::class,'internships']);
    Route::get('/offer/{id}', [offerDetails::class,'show'])->name('offer.show');
    Route::get('/internships/search', [Search::class,'offers'])->name('offer.search');
    Route::get('/offer/{id}/apply', [Applications::class,'showApply'])->name('offer.apply');
    Route::post('/offer/{id}/apply/done', [Applications::class,'store'])->name('offer.doneApply');

    //wishlist Routes
    Route::post('/wishlist/{id}/add', [wishlists::class,'add'])->name('wishlist.add');
    Route::delete('/wishlist/{id}/destroy', [wishlists::class,'delete'])->name('wishlist.delete');


    //Admin Routes
    Route::get('/admin/dashboard', [AdminController::class,'show'])->name('dashboard');

    //admin students CRUD
    Route::get('/admin/student', [UserCRUD::class, 'index'])->name('student.index');
    Route::get('/admin/student/create', [UserCRUD::class, 'create'])->name('student.create');
    Route::post('/admin/student/create/done', [UserCRUD::class, 'store'])->name('student.store');
    Route::get('/admin/student/show/{id}', [UserCRUD::class, 'show'])->name('student.show');
    Route::get('/admin/student/{id}/edit', [UserCRUD::class, 'edit'])->name('student.edit');
    Route::PATCH('/admin/student/{id}/edit/done', [UserCRUD::class, 'update'])->name('student.update');
    Route::delete('/admin/student/delete/{id}', [UserCRUD::class, 'destroy'])->name('student.destroy');
    Route::get('admin/student/search', [Search::class, 'student'])->name('student.search');

    //admin pilots CRRUD
    Route::get('/admin/pilote', [piloteCRUD::class, 'index'])->name('pilote.index');
    Route::get('/admin/pilote/create', [piloteCRUD::class, 'create'])->name('pilote.create');
    Route::post('/admin/pilote/create/done', [piloteCRUD::class, 'store'])->name('pilote.store');
    Route::get('/admin/pilote/show/{id}', [piloteCRUD::class, 'show'])->name('pilote.show');
    Route::get('/admin/pilote/{id}/edit', [piloteCRUD::class, 'edit'])->name('pilote.edit');
    Route::PATCH('/admin/pilote/{id}/edit/done', [piloteCRUD::class, 'update'])->name('pilote.update');
    Route::delete('/admin/pilote/delete/{id}', [piloteCRUD::class, 'destroy'])->name('pilote.destroy');    
    Route::get('admin/pilote/search', [Search::class, 'pilotes'])->name('piloteSearch');

    Route::resource('/admin/internship', internshipCRUD::class);
    Route::resource('/admin/company', companyCRUD::class);
});



