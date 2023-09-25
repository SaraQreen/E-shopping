<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); // user must be authenticated
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function contact(){
        return view('frontEnd.contact');
    }

    public function insert(ContactRequest $request){
        $contact= Contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
            
        ]);

        
        if($contact)
        return response() ->json([
            'status'=>true,
            'msg'=>'The Request Send Successfully',
        ]);

        else
        return response() ->json([
            'status'=>false,
            'msg'=>'Fail',
        ]);
        

    }

    public function about(){
        return view('frontEnd.about');
    }

}
