<?php

use App\Models\Settings;
use App\Models\SocialMedia;
use App\Models\User;

function settings(){
    return Settings::firstOrFail();
}

function linkActive($routeName){
   return request()->route()->getName() === $routeName ? 'active' : '' ;
}

function upload($image,$folder,$prev_image=""){
    if(file_exists($prev_image)){
        unlink($prev_image);
    }
    $filename=uniqid(time()).".".$image->getClientOriginalExtension();
    $image->storeAs($folder,$filename,"public");
    return "storage/".$folder."/".$filename;
}


function randomPassword($length=6){
    $string="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz";
    return substr(str_shuffle($string),0,$length);
}

function getPatientFromAppointment($patient_id){
    return User::findOrFail($patient_id);
}

function getDoctorFromAppointment($doctor_id){
    return User::findOrFail($doctor_id);
}


function medias(){
    return SocialMedia::all();
}
