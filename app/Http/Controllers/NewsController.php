<?php

namespace App\Http\Controllers;

use App\Menu;
use App\News;
use App\Room;
use App\Slider;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use DB;
class NewsController extends Controller
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

        $new = News::where('language_id', $language_id)->take(10)->get();
        return View::make('news', array('menus' => $menus, 'sliders' => $slider, 'news' => $new));
    }
}
