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

Route::get('{language}/','HomeController@load');
Route::get('{language}/introduction','IntroductionController@load');
Route::get('{language}/room','Room_CategoriesController@load');
Route::get('{language}/tour_guide','Tour_GuideController@load');
Route::get('{language}/local_food','Local_FoodController@load');
Route::get('{language}/news','NewsController@load');
Route::get('{language}/reservation','ReservationController@load');
Route::get('{language}/location','LocationController@load');
Route::get('{language}/booking','Booking_RoomController@load');
Route::get('{language}/contact','Contact_UsController@load');