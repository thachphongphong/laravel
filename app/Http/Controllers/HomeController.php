<?php

namespace App\Http\Controllers;

use App\ContactDetail;
use App\Introduce;
use App\Menu;
use App\Room;
use App\Slider;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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
        } else {
            $language_id = 2;
            $constants = Config::get('constants.en');
        }
        $menus = Menu::with('submenus')
            ->where('language_id', $language_id)
            ->orderBy('order', 'asc')
            ->get();
        $slider = Slider::where('language_id', $language_id)->get();
        $room = Room::where('language_id', $language_id)->take(3)->get();
        $about = Introduce::where('language_id', $language_id)->first();
        $contact = ContactDetail::where('language_id', $language_id)->first();
        return View::make('home', array('constants' => $constants, 'menus' => $menus, 'sliders' => $slider, 'abouts' => $about,
            'rooms' => $room, 'contact' => $contact));
    }
}
