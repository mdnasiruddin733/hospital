<?php

use App\Http\Controllers\Doctor\ProfileController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
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
    
    Route::get("/doctors",[DoctorController::class,"doctors"])->name("doctors");
    Route::get("/doctors/create",[DoctorController::class,"createDoctor"])->name("doctors.create");
    Route::post("/doctors/store",[DoctorController::class,"storeDoctor"])->name("doctors.store");
    Route::get("/doctors/show/{id}",[DoctorController::class,"showDoctor"])->name("doctors.show");
    Route::get("/doctors/delete/{id}",[DoctorController::class,"deleteDoctor"])->name("doctors.delete");


    Route::get("/patients",[PatientController::class,"patients"])->name("patients");
    Route::get("/patients/create",[PatientController::class,"createPatient"])->name("patients.create");
    Route::post("/patients/store",[PatientController::class,"storePatient"])->name("patients.store");
    Route::get("/patients/show/{id}",[PatientController::class,"showPatient"])->name("patients.show");
    Route::get("/patients/delete/{id}",[PatientController::class,"deletePatient"])->name("patients.delete");

});

Route::group(["middleware"=>["auth","doctor"],"prefix"=>"doctor","as"=>"doctor."],function(){
    Route::get("/dashboard",function(){
        return view("doctor.dashboard");
    })->name("dashboard");
    Route::get("/profile",[ProfileController::class,"index"])->name("profile.index");
    Route::post("/profile/store",[ProfileController::class,"store"])->name("profile.store");
});



Route::group(["middleware"=>["auth","patient"],"prefix"=>"patient","as"=>"patient."],function(){
    Route::get("/dashboard",function(){
        return view("patient.dashboard");
    })->name("dashboard");
});


// Frontend routes

Route::get("/",[FrontendController::class,"index"])->name("frontend.index");
