<?php

namespace Automail\Contact\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Automail\Contact\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Automail\Contact\Mail\ContactMailable;

class ContactController extends Controller
{
    public function index(){
        return view('contact::contact');
    }

    public function send(Request $request){
        Mail::to(config('contact.send_mail_to'))->send(new ContactMailable($request->message,$request->name));
        Contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message,
        ]);
        return redirect()->back();
    }
}
