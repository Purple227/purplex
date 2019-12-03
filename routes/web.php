<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//play 
 Route::get('/', function () {
    return view('play');
});


/*
|-------------------------------------------------------------------------------
|  Admin Interface
|-------------------------------------------------------------------------------
| Description: This route group wrapped most repetitive stuff so feel free to always add to the
| array list anything that becoming repetietive to you.
  
| Route Group: ["Namespace", "Prefix", "Add Yours"]
*/
Route::group(['namespace'=>'Backend', 'prefix'=>'admin' ], function() 
{

  /*
  |-------------------------------------------------------------------------------
  | Dashboard Home
  |-------------------------------------------------------------------------------
  | URL:            /localhost/dashboard/* (Router view home outlet for dashboard)
  | Controller:     AdminHomeController
  | Method:         GET , adminHome() 
  | Description:    This my router view outlet for admin panel
  */
  //Route::get('/{dashboard}', 'AdminHomeController@adminHome')->where('dashboard', '.*');
  
});




/*
|-------------------------------------------------------------------------------
|  User Interface
|-------------------------------------------------------------------------------
| Description: This route group wrapped most repetitive stuff so feel free to always add to the
| array list anything that becoming repetietive to you.
  
| Route Group: ["Namespace", "Add Yours"]
*/

Route::namespace('Frontend')->group(function () {
  /*
  |-------------------------------------------------------------------------------
  | User Home
  |-------------------------------------------------------------------------------
  | URL:            /localhost/* (Router view home outlet for users)
  | Controller:     HomeController
  | Method:         GET , index() 
  | Description:    This my router view outlet for user interface
  */
  //Route::get('/{any}', 'HomeController@index')->where('any', '.*');

});



















































