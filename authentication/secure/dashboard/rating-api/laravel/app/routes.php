<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});
/*Route::get('rating/seller={seller}&buyer={buyer}', function($seller, $buyer)
{
    return "We are in the $seller/$buyer page";
});
Route::get('review/username={user}',function($user){

	return "$user";
});
*/
Route::get('rating/seller={seller}&buyer={buyer}&redirect={urls}','HomeController@showRatingForm');
Route::get('rating/seller=&buyer={buyer}','HomeController@showError');
Route::get('rating/seller={buyer}&buyer=','HomeController@showError');


Route::get('review/username={user}','HomeController@showReview');
Route::get('review/username=','HomeController@showerrors');

Route::post('/login','HomeController@saveDatabase');

Route::get('/rating/{username}','HomeController@calculateRating');
Route::get('/rating/','HomeController@showerrors');

Route::get('/check/{user}','HomeController@showCheck');
