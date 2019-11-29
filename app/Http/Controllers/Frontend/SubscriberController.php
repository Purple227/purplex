<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscriber;
use App\Model\Subscriber;


class SubscriberController extends Controller
{
    
    public function store(StoreSubscriber $request)
    {

    	// The incoming request is valid...

        // Retrieve the validated input data...
        $validated = $request->validated();


        $subscriber = new Subscriber;

        $subscriber->email = $request->email;

        $subscriber->save();

    }

}
