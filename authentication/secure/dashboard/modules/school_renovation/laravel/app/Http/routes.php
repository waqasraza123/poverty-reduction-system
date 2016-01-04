<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Event::listen('illuminate.query', function($query)
//{
//    var_dump($query);
//});
Route::get('/', function () {
    return Redirect::to('login');
});

Route::get('/dashboard', function () {
    $actual_link = "http://$_SERVER[HTTP_HOST]";
    return Redirect::away($actual_link."/authentication/secure/dashboard");
});

Route::get('/aboutus', function () {
    return view('about_us');
});

Route::get('/contactus', function () {
    return view('contact_us');
});

Route::get('/login', function () {
    //$_SESSION['session_name'] = 1; 
    if (isset($_SESSION['session_name'])){
        $id = $_SESSION['session_name'];
        Session::put('id', $id);
        Auth::loginUsingId($id,true);
        return Redirect::to('listings');
    }else{
        return Redirect::to('dashboard');
    }
});

Route::get('/logout', function () {
    Auth::logout();
    $actual_link = "http://$_SERVER[HTTP_HOST]";
    return Redirect::away($actual_link."/authentication/secure/dashboard/logout.php");
});

Route::get('completed','ListingsController@completed');
Route::get('listings','ListingsController@index');
Route::get('listings/my','ListingsController@my');
Route::get('listings/add','ListingsController@create');
Route::get('listings/delete/{id}','ListingsController@delete');
Route::get('listings/edit/{id}','ListingsController@edit');
Route::get('listings/show/{id}','ListingsController@show');
Route::get('listings/search','ListingsController@search');
Route::post('payment','ListingsController@pay');
Route::post('listings/add','ListingsController@store');
Route::post('listings/edit','ListingsController@update');
