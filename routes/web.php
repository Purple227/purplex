<?php

Route::group(['namespace'=>'Auth', 'prefix'=>'admin' ], function() 
{

Route::post('register', 'RegisterController@register');
Route::post('login', 'LoginController@login');
Route::resource('user', 'UserController');
Route::post('logout', 'LoginController@logout');

});


Route::group(['namespace'=>'Backend', 'prefix'=>'admin' ], function() 
{

  Route::get('/{dashboard}', 'AdminHomeController@adminOutlet')->where('dashboard', '.*');
  
});


Route::namespace('Frontend')->group(function () {

  Route::get('/{any}', 'HomeController@index')->where('any', '.*');

});



















































