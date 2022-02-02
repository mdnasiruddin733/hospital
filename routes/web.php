<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(["middleware"=>["auth","admin"],"prefix"=>"admin"],function(){
    Route::get("/dashboard",function(){
        return view("admin.dashboard");
    });
});

Route::group(["middleware"=>["auth","doctor"],"prefix"=>"doctor"],function(){
    Route::get("/dashboard",function(){
        return view("doctor.dashboard");
    });
});

Route::group(["middleware"=>["auth","patient"],"prefix"=>"patient"],function(){
    Route::get("/dashboard",function(){
        return view("patient.dashboard");
    });
});
