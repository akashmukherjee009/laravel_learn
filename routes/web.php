<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;


use App\Http\Controllers\frontend\about;
use App\Http\Controllers\frontend\contact;
use App\Http\Controllers\frontend\feature;
use App\Http\Controllers\frontend\index;
use App\Http\Controllers\frontend\page404;
use App\Http\Controllers\frontend\price;
use App\Http\Controllers\frontend\quote;
use App\Http\Controllers\frontend\service;
use App\Http\Controllers\frontend\team;
use App\Http\Controllers\frontend\testimonial;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{lang?}', function ($lang = null) {
    App::setlocale($lang);
    return view('welcome');
});

Route::get('/register',[RegistrationController::class, 'index']);
Route::post('/register',[RegistrationController::class, 'register']);

Route::group(['prefix'=>'/customer'],function(){
    Route::get('',[CustomerController::class, 'index']);
    Route::post('',[CustomerController::class, 'store']);

    Route::get('/delete/{id}',[CustomerController::class, 'delete'])->name('delete');
    Route::get('/restore/{id}',[CustomerController::class, 'restore'])->name('restore');
    Route::get('/pdelete/{id}',[CustomerController::class, 'pdelete']);


    Route::get('/edit/{id}',[CustomerController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',[CustomerController::class, 'update']);
    Route::get('/trash',[CustomerController::class, 'trash']);

    Route::get('/view',[CustomerController::class, 'view']);

});

Route::get('/get-all-session',function (){
    $session= session()->all();
    echo "<pre>";
    print_r($session);
});

Route::get('/set-session',function (Request $req){
    
    $req->session()->put('name', 'Akash');
    $req->session()->put('email', 'a@gmail.com');
    $req->session()->flash('status', 'Success');

    return redirect('get-all-session');
});

Route::get('/session-delete',function (){
    session()->forget('name');
    return redirect('get-all-session');
});


Route::get('/test',function(){
    return "Hii";
});



Route::get('/templete',[index::class, 'index']);
Route::get('/templete/about',[about::class, 'index']);
Route::get('/templete/contact',[contact::class, 'index']);
Route::get('/templete/feature',[feature::class, 'index']);
Route::get('/templete/page404',[page404::class, 'index']);
Route::get('/templete/price',[price::class, 'index']);
Route::get('/templete/quote',[quote::class, 'index']);
Route::post('/templete/quote',[quote::class, 'upload']);
Route::get('/templete/service',[service::class, 'index']);
Route::get('/templete/team',[team::class, 'index']);
Route::get('/templete/testimonial',[testimonial::class, 'index']);

