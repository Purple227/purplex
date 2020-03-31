<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function securityChecked()
    {
        if (Auth::check()) {
            $user_login = true;
        }else {
            $user_login = false;
        }
        return response()->json($user_login);
    }



}
