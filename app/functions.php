<?php

use App\Models\Settings;

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
