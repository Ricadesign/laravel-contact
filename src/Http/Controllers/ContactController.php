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
        return 'Message Sent';
    }

    public function assets(Request $request)
    {
        try {
            $path = dirname(__DIR__, 3).'/publishable/assets/'.Util::normalizeRelativePath(urldecode($request->path));
        } catch (\LogicException $e) {
            abort(404);
        }

        if (File::exists($path)) {
            $mime = '';
            if (Str::endsWith($path, '.js')) {
                $mime = 'text/javascript';
            } elseif (Str::endsWith($path, '.css')) {
                $mime = 'text/css';
            } else {
                $mime = File::mimeType($path);
            }
            $response = response(File::get($path), 200, ['Content-Type' => $mime]);
            $response->setSharedMaxAge(31536000);
            $response->setMaxAge(31536000);
            $response->setExpires(new \DateTime('+1 year'));

            return $response;
        }

        return response('', 404);
    }

}
