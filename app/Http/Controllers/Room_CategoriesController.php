<?php

namespace App\Http\Controllers;
use App\ContactDetail;
use App\Http\Requests;
use App\Menu;
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
        $room = Room::where('language_id', $language_id)->get();
        return View::make('room', array('constants' => $constants,'menus' => $menus, 'contact' => $contact, 'rooms' => $room));
    }
}
