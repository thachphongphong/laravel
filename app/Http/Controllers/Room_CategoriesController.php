<?php

namespace App\Http\Controllers;
use App\Menu;
use App\Room;
use App\Slider;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use DB;

class Room_CategoriesController extends Controller
{
    public function load($language)
    {
        $language_id = 1;
        if ($language == 'vi') {
            $language_id = 1;
        } else {
            $language_id = 2;
        }
        $menus = Menu::with('submenus')
            ->where('language_id', $language_id)
            ->orderBy('order', 'asc')
            ->get();
        $slider = Slider::all();

        $room = Room::where('language_id', $language_id)->get();
        return View::make('room', array('menus' => $menus, 'sliders' => $slider, 'rooms' => $room));
    }
}
