<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();


Route::group(["middleware"=>["auth","admin"],"prefix"=>"admin","as"=>"admin."],function(){
    Route::get("/dashboard",function(){
        return view("admin.dashboard");
    })->name("dashboard");

    Route::get("/settings",[SettingsController::class,"index"])->name("settings");
    Route::post("/settings/save",[SettingsController::class,"save"])->name("settings.save");
});

Route::group(["middleware"=>["auth","doctor"],"prefix"=>"doctor","as"=>"doctor."],function(){
    Route::get("/dashboard",function(){
        return view("doctor.dashboard");
    })->name("dashboard");
});

Route::group(["middleware"=>["auth","patient"],"prefix"=>"patient","as"=>"patient."],function(){
    Route::get("/dashboard",function(){
        return view("patient.dashboard");
    })->name("dashboard");
});


// Frontend routes

Route::get("/",[FrontendController::class,"index"])->name("frontend.index");
