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

Route::get('/', function () {
    return view('welcome');
});
Route::get('home','HomeController@load');
Route::get('introduction','IntroductionController@load');
Route::get('room','Room_CategoriesController@load');
Route::get('tour_guide','Tour_GuideController@load');
Route::get('local_food','Local_FoodController@load');
Route::get('news','NewsController@load');
Route::get('reservation','ReservationController@load');
Route::get('location','LocationController@load');
Route::get('booking','Booking_RoomController@load');
Route::get('contact','Contact_UsController@load');