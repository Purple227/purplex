<?php

Route::group(['namespace'=>'Auth', 'prefix'=>'admin' ], function() 
{

Route::post('user/update', 'UserController@update');
Route::post('user/update/security', 'UserController@updateSecurity');

Route::post('register', 'RegisterController@register');
Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout');

Route::resource('user', 'UserController');

});


Route::group(['namespace'=>'Backend', 'prefix'=>'admin' ], function() 
{

  Route::get('/{dashboard}', 'AdminHomeController@adminOutlet')->where('dashboard', '.*');
  
});


Route::namespace('Frontend')->group(function () {

  Route::get('/{any}', 'HomeController@index')->where('any', '.*');

});



















































