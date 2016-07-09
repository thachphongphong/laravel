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
    public function load()
    {
        $menus = Menu::with('submenus')
            ->orderBy('order', 'desc')
            ->get();
        $slider = Slider::all();

        return View::make('app', array('menus' => $menus, 'sliders' => $slider));
    }
}
