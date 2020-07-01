<?php

namespace Ricadesign\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Ricadesign\Contact\Mail\MessageSent;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact::index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $request->validate( [
           'name' => 'required',
           'email'=> 'required|email',
           'phone' => 'sometimes|required|size:9',
           'message' => 'required|min:12',
        ]);
        $name = $result['name'];
        $email = $result['email'];
        $message = $result['message'];
        $phone =  $request->input('phone', null);
        //SendMail
        Mail::to(config('contact.email'))
        ->send(new MessageSent($name, $email, $message, $phone));
        //Everything OK
        return view('contact::index')
          ->with('message', 'The message has been sent succesfully');
    }

}
