<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Subscriber;


class SubscriberController extends Controller
{
    
    public function store(Request $request)
    {

	// Retrieve email by name, or create it if it doesn't exist...
	$email = Subscriber::firstOrCreate(['email' => $request->email]);
    }

}
