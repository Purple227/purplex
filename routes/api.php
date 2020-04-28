<?php

use Illuminate\Http\Request;


Route::group(['namespace'=>'Backend', 'prefix'=>'admin' ], function() 
{

  Route::get('home', 'DashboardController@dashboard');
  Route::get('posts/{date}', 'PostController@sortByDate');
  Route::get('posts/table/search', 'PostController@search');
  Route::get('tags/table/search', 'TagController@search');
  Route::get('subscriber/table/search', 'SubscriberController@search');

	Route::apiResources
	([
		'post' => 'PostController',
    'tag' => 'TagController',
    'subscriber' => 'SubscriberController'
	]);

});


Route::group(['namespace'=>'Frontend' ], function() 
{

  Route::post('contact', 'ContactController@sendMail');
  Route::post('subscriber', 'SubscriberController@store');
  Route::get('blog/search', 'BlogController@search');
  Route::get('about/data', 'AboutController@adminData');

    Route::apiResources
  ([
    'blog' => 'BlogController',
  ]);

});

































