<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;


class AboutController extends Controller
{

    public function adminData()
    {
        $user = User::find(1);
        return response()->json($user);
        
    }

}
