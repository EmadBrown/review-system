<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }
    
    public function postContact(Request $request) 
    {
        
        $data = array(
           'name' => $request->name ,
           'email' => $request->email,
           'organization' => $request->organization,
           'position' => $request->position,
           'bodySubject' => $request->message
        );
        
        Mail::send('emails.contact' , $data , function($message) use ($data){
            $message->from($data['email']);
            $message->to('ec764e6eda-121801@inbox.mailtrap.io');
            $message->subject($data['name'], $data['email'], $data['organization'], $data['position'], $data['bodySubject']);
 
        });
        
          Session::flash('success', 'Your Email was Sent!');
        
        return view('pages.index');
    }
}
