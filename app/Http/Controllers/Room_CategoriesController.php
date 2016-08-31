<?php

namespace App\Http\Controllers;

use App\ContactDetail;
use App\Http\Requests;
use App\Menu;
use App\PageTitle;
use App\Room;
use Config;
use DB;
use View;

class Room_CategoriesController extends Controller
{
    public function load($language)
    {
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
        $contact = ContactDetail::where('language_id', $language_id)->first();

        $room = Room::with('roomdetails')->where('language_id', $language_id)->get();

        $title = PageTitle::where('language_id', $language_id)->where('page_id', 2)
            ->orderByRaw("RAND()")->first();

        return View::make('room', array('constants' => $constants, 'menus' => $menus, 'contact' => $contact,
            'rooms' => $room, 'title' => $title));
    }
}
