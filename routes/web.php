<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;



Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/home',[HomeController::class,'redirect'])->middleware('auth','verified')->name('home');

Route::get('doctors',[HomeController::class,'doctors'])->name('doctors');
Route::get('news',[HomeController::class,'news'])->name('news');
Route::get('news/details',[HomeController::class,'details'])->name('details');
Route::get('contact',[HomeController::class,'contact'])->name('contact');
Route::post('contactform',[HomeController::class,'contactform'])->name('contactform');
Route::get('about',[HomeController::class,'about'])->name('about');
Route::post('/appointment',[HomeController::class,'appointment']);
Route::get('myappointment',[HomeController::class,'myappointment'])->name('myappointment');
Route::get('/cancel_appoint/{id}',[HomeController::class,'cancel_appoint']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/add_doctor_view',[AdminController::class,'addview']);
Route::post('/upload_doctor',[AdminController::class,'upload']);
Route::get('/showappointment',[AdminController::class,'showappointment']);
Route::get('showmessage',[AdminController::class,'showmessage'])->name('showmessage');
Route::get('/approved/{id}',[AdminController::class,'approved']);
Route::get('/canceled/{id}',[AdminController::class,'canceled']);
Route::get('/emailview/{id}',[AdminController::class,'emailview']);

Route::get('/showdoctor',[AdminController::class,'showdoctor']);

Route::get('/deleteddoctor/{id}',[AdminController::class,'deleteddoctor']);
Route::get('/deletemail/{id}',[AdminController::class,'deletemail'])->name('deletemail');

Route::get('/updatedoctor/{id}',[AdminController::class,'updatedoctor']);

Route::post('/editdoctor/{id}',[AdminController::class,'editdoctor']);

Route::post('/sendemail/{id}',[AdminController::class,'sendemail']);
