<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $user_login = true;
        }else {
            $user_login = false;
        }
        return response()->json($user_login);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        $email = Auth::user()->email;
        $hashedPassword = Auth::user()->password;

        if ($request->save == true) {
        $validatedData = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

        if ( Hash::check($request->password_querry, $hashedPassword) ) {
            $user->password = Hash::make($request->password);
            $password_bridge = true;
        } else {
            $password_bridge = false;
        }

        if ( $request->email_querry == $email ) {
            $user->email = $request->email;
            $email_bridge = true;
        } else {
            $email_bridge = false;
        }

        if($request->save == true) {
         $user->save();
        }
        
        return response()->json([$password_bridge, $email_bridge]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail(Auth::id());
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail(Auth::id());

        $validatedData = $request->validate([
        'name' => ['required', 'string', 'max:20'],
        ]);

        if ( $request->hasFile('file') ) {
            Storage::deleteDirectory('public/profile');
            $path = Storage::disk('public')->putFile('profile',$request->file('file'));
            $user->image = $path;
        }
        
        $user->name = $request->name;
        $user->title = $request->title;
        $user->subtitle = $request->subtitle;
        $user->description = $request->description;
        $user->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
