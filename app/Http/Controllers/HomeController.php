<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Slider;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use DB;

class HomeController extends Controller
{
    public function load($language)
    {
        $language_id = 1;
        if ($language == 'vi') {
            $language_id =1;
        }else{
            $language_id =2;
        }
        $menus = Menu::with('submenus')
            ->where('language_id', $language_id)
            ->orderBy('order', 'asc')
            ->get();
        $slider = Slider::all();

        return View::make('app', array('menus' => $menus, 'sliders' => $slider));
    }
}
