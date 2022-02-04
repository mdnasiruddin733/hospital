<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
   public function sendMail(Request $req){
        $this->validate($req,[
            "name"=>"required",
            "email"=>"required|email",
            "subject"=>"required",
            "message"=>"required"
        ]);
        $data=[
            "name"=>$req->name,
            "body"=>$req->message,
            "subject"=>$req->subject,
            "logo"=>public_path()."/".settings()->logo
        ];
        Mail::send("frontend.mail",$data, function ($message) use ($req)
        {
            $message->to(settings()->email, settings()->short_name)
                ->subject($req->subject);
            $message->from($req->email, $req->name);
        });
        return back()->with([
            "type"=>"success",
            "message"=>"Your mail is sent successfully"
        ]);
   }
}
