<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index(){
        $newses=News::latest()->get();
        return view("news.index",compact("newses"));
    }

    public function create(){
        return view("news.create");
    }

    public function store(Request $req){
        $this->validate($req,[
            "image"=>"required|image|max:20480",
            "title"=>"required|max:100",
            "category"=>"required",
            "status"=>"required",
            "tags"=>"required",
            "body"=>"required"
        ]);
        $news=new News();
        $news->user_id=Auth::user()->id;
        $news->title=$req->title;
         $news->status=$req->status;
          $news->category=$req->category;
           $news->tags=$req->tags;
            $news->body=$req->body;
            if($req->image){
                $news->image=upload($req->image,"news");
            }
            $news->save();
            return redirect(route("backend.news"))->with([
                "type"=>"success",
                "message"=>"News created successfully"
            ]);
    }

    public function edit($id){
        $news=News::findOrFail($id);
        return view("news.edit",compact("news"));
    }

    public function update(Request $req){
        $this->validate($req,[
            "id"=>"required",
           
            "title"=>"required|max:100",
            "category"=>"required",
            "status"=>"required",
            "tags"=>"required",
            "body"=>"required",
            "image"=>"nullable|image|max:20480",
        ]);
        $news=News::findOrFail($req->id);
        $news->user_id=Auth::user()->id;
        $news->title=$req->title;
         $news->status=$req->status;
          $news->category=$req->category;
           $news->tags=$req->tags;
            $news->body=$req->body;
            if($req->image){
                $news->image=upload($req->image,"news",$news->image);
            }
            $news->save();
            return redirect(route("backend.news"))->with([
                "type"=>"success",
                "message"=>"News updated successfully"
            ]);
    }

    public function delete($id){
        $news=News::findOrFail($id);
        if(file_exists($news->image)){
            unlink($news->image);
        }
        $news->delete();
        return redirect(route("backend.news"))->with([
                "type"=>"success",
                "message"=>"News delete successfully"
            ]);
    }
}
