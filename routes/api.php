<?php

use Illuminate\Http\Request;

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
		'post' => 'PostController'
	]);

  Route::get('dashboard', 'DashboardController@dashboard');

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

































