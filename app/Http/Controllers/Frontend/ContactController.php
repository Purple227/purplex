<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Http\Requests\sendMail;

class ContactController extends Controller
{

	public function sendMail(sendMail $request)
    {   


        $data = [
            'subject' => $request->subject,
            'email' => $request->email,
            'message' => $request->message
        ];

    	//Send an email
    	Mail::to('purplex227@gmail.com')->send(new ContactMail($data));
    }
}
