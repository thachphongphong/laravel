<?php

namespace App\Http\Controllers;

use App\ContactDetail;
use App\Http\Requests;
use App\Menu;
use App\PageTitle;
use Config;
use View;

class Booking_RoomController extends Controller
{
    /**
     * @param $language
     * @return mixed
     */
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

        $title = PageTitle::where('language_id', $language_id)->where('page_id', 1)
            ->orderByRaw("RAND()")->first();

        $contact = ContactDetail::where('language_id', $language_id)->first();

        return View::make('booking', array('constants' => $constants,'menus' => $menus, 'contact' => $contact, 'title' =>$title));
    }
}
