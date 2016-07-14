<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use View;
use App\Introduce;
use App\Menu;
use App\Room;
use App\Slider;
use DB;

class IntroductionController extends Controller
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
        $about = Introduce::where('language_id', $language_id)->first();
        return View::make('about', array('menus' => $menus, 'sliders' => $slider, 'abouts' => $about));
    }
}
