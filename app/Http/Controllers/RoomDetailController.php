<?php

namespace App\Http\Controllers;

use App\ContactDetail;
use App\Gallery;
use App\Http\Requests;
use App\Menu;
use App\PageTitle;
use App\Room;
use Config;
use View;

class RoomDetailController extends Controller
{
    public function load($language,$id)
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

        $room = Room::with('roomdetails')->where('id', $id)->where('language_id', $language_id)->first();

        $title = new PageTitle();
        $title->title = $room ->name;
        $title->desc = $room ->description . ' - ' . $room->total_person . ' ' . $constants['room']['person'];

//        $promotion =

        $image = Gallery::where('room_id', $id)->get();

        return View::make('room_single', array('constants' => $constants,'menus' => $menus, 'contact' => $contact, 'title' =>$title,
            'room' =>$room, 'images' => $image));
    }
}
