<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Doctor\ProfileController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SocialMediaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\News;
Auth::routes();

Route::get("/register",function(){
    return redirect(route("login"));
})->name("register");
Route::group(["middleware"=>["auth"]],function(){
    Route::get("/profile",[ProfileController::class,"index"])->name("profile.index");
    Route::post("/profile/store",[ProfileController::class,"store"])->name("profile.store");
    Route::get("/password/change",[ProfileController::class,"changePassword"])->name("password.change");
    Route::post("/password/reset",[ProfileController::class,"resetPassword"])->name("password.reset");
});

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

    Route::get("/medias",[SocialMediaController::class,"index"])->name("medias");
    Route::get("/media/create",[SocialMediaController::class,"create"])->name("media.create");
    Route::post("/media/store",[SocialMediaController::class,"store"])->name("media.store");
    Route::get("/media/edit/{id}",[SocialMediaController::class,"edit"])->name("media.edit");
    Route::post("/media/update",[SocialMediaController::class,"update"])->name("media.update");
    Route::get("/media/delete/{id}",[SocialMediaController::class,"delete"])->name("media.delete");
});

Route::group(["middleware"=>["auth","doctor"],"prefix"=>"doctor","as"=>"doctor."],function(){
    Route::get("/dashboard",function(){
        return view("doctor.dashboard");
    })->name("dashboard");
    Route::get("/profile",[ProfileController::class,"index"])->name("profile.index");
    Route::post("/profile/store",[ProfileController::class,"store"])->name("profile.store");
    Route::get("/password/change",[ProfileController::class,"changePassword"])->name("password.change");
    Route::post("/password/reset",[ProfileController::class,"resetPassword"])->name("password.reset");

    Route::get("/appointments",[FrontendController::class,"appointments"])->name("appointments");
    Route::get("/appointment/delete/{id}",[FrontendController::class,"deleteAppointment"])->name("appointment.delete");
    Route::get("/appointment/status/{id}",[FrontendController::class,"changeAppointmentStatus"])->name("appointment.status");

     Route::get("/prescriptions",[FrontendController::class,"prescriptions"])->name("prescriptions");
     Route::get("/prescription/create",[FrontendController::class,"createPrescription"])->name("prescription.create");
     Route::post("/prescription/store",[FrontendController::class,"storePrescription"])->name("prescription.store");
    Route::get("/prescription/edit/{id}",[FrontendController::class,"editPrescription"])->name("prescription.edit");
    Route::post("/prescription/update",[FrontendController::class,"updatePrescription"])->name("prescription.update");
});



Route::group(["middleware"=>["auth","patient"],"prefix"=>"patient","as"=>"patient."],function(){
    Route::get("/dashboard",function(){
        return view("patient.dashboard");
    })->name("dashboard");
    Route::get("/prescriptions",[PrescriptionController::class,"index"])->name("prescriptions");
    Route::get("/prescription/{id}",[PrescriptionController::class,"show"])->name("prescription.show");
    Route::get("/prescription/download/{id}",[PrescriptionController::class,"download"])->name("prescription.download");
    Route::get("/appointments",[PrescriptionController::class,"appointments"])->name("appointments");
    Route::get("/appointment/delete/{id}",[PrescriptionController::class,"deleteAppointment"])->name("appointment.delete");
    Route::get("/my-payments",[PaymentController::class,"showMyPayments"])->name("my-payments");
    Route::get("/pay/{id}",[PaymentController::class,"pay"])->name("pay");
});

// Backend routes 


Route::group(["middleware"=>["auth"],"as"=>"backend."],function(){
    Route::get("backend/news",[NewsController::class,"index"])->name("news");
    Route::get("backend/news/create",[NewsController::class,"create"])->name("news.create");
    Route::post("/backend/news/store",[NewsController::class,"store"])->name("news.store");
    Route::get("backend/news/edit/{id}",[NewsController::class,"edit"])->name("news.edit");
    Route::post("backend/news/update",[NewsController::class,"update"])->name("news.update");
    Route::get("backend/news/delete/{id}",[NewsController::class,"delete"])->name("news.delete");
});


Route::group(["middleware"=>["auth","admin"],"as"=>"backend."],function(){
    Route::get("backend/payments",[PaymentController::class,"index"])->name("payments");
    Route::get("backend/payment/create",[PaymentController::class,"create"])->name("payment.create");
    Route::post("/backend/payment/store",[PaymentController::class,"store"])->name("payment.store");
    Route::get("backend/payment/edit/{id}",[PaymentController::class,"edit"])->name("payment.edit");
    Route::post("backend/payment/update",[PaymentController::class,"update"])->name("payment.update");
    Route::get("backend/payment/delete/{id}",[PaymentController::class,"delete"])->name("payment.delete");
});

// Frontend routes

Route::get("/",[FrontendController::class,"index"])->name("frontend.index");
Route::get("/about",[FrontendController::class,"about"])->name("frontend.about");
Route::get("/doctors",[FrontendController::class,"doctors"])->name("frontend.doctors");
Route::get("/news",[FrontendController::class,"news"])->name("frontend.news");
Route::get("/contact",[FrontendController::class,"contact"])->name("frontend.contact");
Route::get("/doctor/details/{id}",[FrontendController::class,"doctorDetails"])->name("frontend.doctor.details");
Route::get("/appoint/{id}",[FrontendController::class,"appoint"])->name("frontend.appoint");
Route::post("contact/mail",[ContactController::class,"sendMail"])->name("frontend.mail");
Route::get("/news/details/{id}",function($id){
    $news=News::findOrFail($id);
    $recent_news=News::latest()->where("status","Active")->limit(4)->get();
    return view("frontend.news-details",compact("news","recent_news"));
})->name("news.details");

Route::post("/news/search",function(Request $req){
    $term="%".$req->term."%";
    $news=News::where("status","Active")
                ->orwhere("category","like",$term)
                ->orWhere("title","like",$term)
                ->orWhere("tags","like",$term)
                ->orWhere("body","like",$term)
                ->first();
    $recent_news=News::latest()->where("status","Active")->limit(4)->get();
    return view("frontend.news-details",compact("news","recent_news"));
})->name("news.search");
