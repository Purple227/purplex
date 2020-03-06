<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{

	public function sendMail(SendMail $request)
    {   
        $validatedData = $request->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
         ]);

    	return '$validatedData';

    	//Send an email
    	Mail::to('purplex@purplex.com')->send(new ContactMail($data));
    }
}
