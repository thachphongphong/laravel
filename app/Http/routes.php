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

Route::get('{language}/', 'HomeController@load');
Route::get('{language}/home', 'HomeController@load');
Route::get('{language}/introduction', 'IntroductionController@load');
Route::get('{language}/room', 'Room_CategoriesController@load');
Route::get('{language}/room/{id}', 'RoomDetailController@load');
Route::get('{language}/tour_guide', 'Tour_GuideController@load');
Route::get('{language}/local_food', 'Local_FoodController@load');
Route::get('{language}/news', 'NewsController@load');
Route::get('{language}/news/travel', 'NewsController@loadTravel');
Route::get('{language}/news/food', 'NewsController@loadFood');
Route::get('{language}/reservation', 'ReservationController@load');
Route::get('{language}/location', 'LocationController@load');

Route::get('{language}/booking', 'Booking_RoomController@load');
Route::get('{language}/booking/{id}', 'Booking_RoomController@book');
Route::post('{language}/booking', 'Booking_RoomController@search');
Route::post('{language}/booking/select', 'Booking_RoomController@select');
Route::post('{language}/booking/userInfo', 'Booking_RoomController@userInfo');
Route::post('{language}/booking/make', 'Booking_RoomController@makeBooking');
Route::get('{language}/contact', 'ContactController@load');
Route::post('{language}/contact/send', 'ContactController@addMessage');
Route::get('{language}/news/{id}', 'NewsDetailController@load');
Route::get('{language}/admin', 'Auth\LoginController@load');
Route::post('{language}/admin/login', 'Auth\LoginController@login');
Route::get('{language}/admin/logout', 'Auth\LoginController@logout')->middleware('auth');
Route::get('{language}/admin/password/forgot', 'Auth\LoginController@forgot');
Route::post('{language}/admin/password/reset', 'Auth\LoginController@reset');
Route::post('{language}/admin/password/update', 'Auth\LoginController@update');
Route::get('{language}/admin/dashboard', 'Admin\DashboardController@load')->middleware('auth');
Route::get('{language}/admin/dashboard/contact/{language_code}', 'Admin\DashboardController@loadContact')->middleware('auth');
Route::post('{language}/admin/dashboard/updateContact', 'Admin\DashboardController@updateContact')->middleware('auth');
Route::post('{language}/admin/dashboard/addNews', 'Admin\DashboardController@addNews')->middleware('auth');

Route::post('{language}/admin/dashboard/upload', 'Admin\UploadImageController@upload')->middleware('auth');;

Route::get('{language}/admin/dashboard/introduce/{language_code}', 'Admin\AboutController@introduce')->middleware('auth');
Route::post('{language}/admin/dashboard/saveAbout', 'Admin\AboutController@saveAbout')->middleware('auth');
Route::post('{language}/admin/dashboard/deleteImageAbout', 'Admin\AboutController@deleteImageAbout')->middleware('auth');
Route::post('{language}/admin/dashboard/upload', 'Admin\UploadImageController@upload')->middleware('auth');
Route::get('{language}/admin/dashboard/room/{id}', 'Admin\EditRoomController@get')->middleware('auth');
Route::post('{language}/admin/dashboard/room/update', 'Admin\EditRoomController@update')->middleware('auth');
Route::post('{language}/admin/dashboard/upload/replace', 'Admin\UploadImageController@replace')->middleware('auth');
Route::get('{language}/admin/dashboard/news/load', 'Admin\NewsController@load')->middleware('auth');
Route::post('{language}/admin/dashboard/news/delete/{id}', 'Admin\NewsController@delete')->middleware('auth');