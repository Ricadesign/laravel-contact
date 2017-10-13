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
           'message' => 'required|min:12',
        ]);
        $name = $result['name'];
        $email = $result['email'];
        $message = $result['message'];
        //SendMail
        Mail::to('payet91@gmail.com')
        ->send(new MessageSent($name, $email, $message));
        //Everything OK
        return view('contact::index')
          ->with('message', 'Se ha enviado el mensaje correctamente');
    }

}
