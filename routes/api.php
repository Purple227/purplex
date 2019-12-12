<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



/*
|-------------------------------------------------------------------------------
|  Admin Interface
|-------------------------------------------------------------------------------
| Description: This route group wrapped most repetitive stuff so feel free to always add to the
| array list anything that becoming repetietive to you.
  
| Route Group: ["Namespace", "Prefix"]
*/
Route::group(['namespace'=>'Backend', 'prefix'=>'admin' ], function() 
{

  /*
  |-------------------------------------------------------------------------------
  | Array API Resource
  |-------------------------------------------------------------------------------
  | URL:            Resource controller have dynamic url map to it. Use the command route:list to see all the uri
  | Controller:     AdminInterface["PostController", "ProjectController"]
  | Method:         resource controller have dynamic method map to it. Use the command route:list to see all method
  | Description:    Get, Post, Put, Delete using the resource controller. Visit the official docs if u seem lost.
  */
	Route::apiResources
	([
		'post' => 'PostController',
		'projects' => 'ProjectController',
	]);

});


/*
|-------------------------------------------------------------------------------
|  User Interface
|-------------------------------------------------------------------------------
| Description: This route group wrapped most repetitive stuff so feel free to always add to the
| array list anything that becoming repetietive to you.
  
| Route Group: ["Namespace","Add Yours"]
*/
Route::group(['namespace'=>'Frontend' ], function() 
{
  /*
  |-------------------------------------------------------------------------------
  | Post resource
  |-------------------------------------------------------------------------------
  | URL:            api/contact
  | Controller:     AdminInterface\ContactController@send
  | Method:         Post
  | Description:    This hit the post method for sending email
  */
  Route::post('contact', 'ContactController@sendMail');

  /*
  |-------------------------------------------------------------------------------
  | Post resource
  |-------------------------------------------------------------------------------
  | URL:            api/subscriber
  | Controller:     AdminInterface\ContactController@send
  | Method:         Post
  | Description:    This hit the store method for storing email
  */
  Route::post('subscriber', 'SubscriberController@store');

  });

































