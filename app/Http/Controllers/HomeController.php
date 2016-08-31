<?php

namespace App\Http\Controllers;

use App\ContactDetail;
use App\Gallery;
use App\Introduce;
use App\Menu;
use App\News;
use App\Room;
use App\RoomService;
use App\Slider;
use App\Tour;
use App\Promotion;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use View;
use DB;
use Config;

class HomeController extends Controller
{
    public function load($language)
    {
        $language_id = 1;
        if ($language == 'vi') {
            $language_id = 1;
            $constants = Config::get('constants.vi');
            $room_service = RoomService::with('bestRoomServiceDetail')
                ->where('language_id', $language_id)
                ->where('id', 1)
                ->get();
        } else {
            $language_id = 2;
            $constants = Config::get('constants.en');
            $room_service = RoomService::with('bestRoomServiceDetail')
                ->where('language_id', $language_id)
                ->where('id', 4)
                ->get();
        }

        Session::put('lang', $language);

        $menus = Menu::with('submenus')
            ->where('language_id', $language_id)
            ->orderBy('order', 'asc')
            ->get();
        $slider = Slider::where('language_id', $language_id)->get();
        $room = Room::where('language_id', $language_id)->take(3)->get();
        $about = Introduce::where('language_id', $language_id)->first();
        $contact = ContactDetail::where('language_id', $language_id)->first();

        $new = News::where('language_id', $language_id)->orderBy('created_date', 'desc')->take(2)->get();

        $image = Gallery::orderByRaw("RAND()")->get();

        $tours = Tour::where('language_id', $language_id)->orderBy('created_date', 'desc')->take(3)->get();

         $promotion = Promotion::where('language_id', $language_id)->where('enabled', 1)->get();

        return View::make('home', array('constants' => $constants, 'menus' => $menus, 'sliders' => $slider, 'abouts' => $about,
            'rooms' => $room, 'contact' => $contact, 'room_services' => $room_service,'news'=>$new, 'images' => $image, 'tours' =>$tours, 'promotions' => $promotion));
    }
}
