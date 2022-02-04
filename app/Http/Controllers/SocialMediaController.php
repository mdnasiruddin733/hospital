<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function index(){
        $medias = SocialMedia::latest()->get();
        return view("admin.medias.index",compact('medias'));
    }
    public function create(){
        return view("admin.medias.create");
    }

    public function store(Request $req){
        $this->validate($req,[
            "name"=>"required",
            "icon"=>"required",
            "link"=>"nullable|url"
        ]);
        SocialMedia::create(
            [
                "name"=>$req->name,
                "icon"=>$req->icon,
                "link"=>$req->link
            ]
        );
        return redirect(route("admin.medias"))->with([
            "type"=>"success",
            "message"=>"Social media link is created successfully"
        ]);
    }

    public function edit($id){
        $media=SocialMedia::findOrFail($id);
        return view("admin.medias.edit",compact("media"));
    }

    public function update(Request $req){
        $this->validate($req,
        [   "id"=>"required",
             "name"=>"required",
            "icon"=>"required",
            "link"=>"nullable|url"
        ]);
        $media=SocialMedia::findOrFail($req->id);
        $media->name=$req->name;
        $media->icon=$req->icon;
        $media->link=$req->link;
        $media->save();
        return redirect(route("admin.medias"))->with([
            "type"=>"success",
            "message"=>"Social media link is updated successfully"
        ]);
    }

    public function delete($id){
        $media=SocialMedia::findOrFail($id);
        $media->delete();
        return redirect(route("admin.medias"))->with([
            "type"=>"success",
            "message"=>"Social media link is deleted successfully"
        ]);
    }
}
