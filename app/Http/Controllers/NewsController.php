<?php

namespace App\Http\Controllers;

use App\ContactDetail;
use App\Http\Requests;
use App\Menu;
use App\News;
use App\PageTitle;
use Config;
use DB;
use View;

class NewsController extends Controller
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

        $title = PageTitle::where('language_id', $language_id)->where('page_id', 3)
            ->orderByRaw("RAND()")->first();

        $menus = Menu::with('submenus')
            ->where('language_id', $language_id)
            ->orderBy('order', 'asc')
            ->get();
        $contact = ContactDetail::where('language_id', $language_id)->first();
        $new = News::where('language_id', $language_id)->where('hash_tag','tintuc')->orderBy('created_date','desc')->take(10)
            ->get();
        return View::make('news', array('constants' => $constants,'menus' => $menus, 'contact' => $contact,  'news' => $new, 'title' =>$title));
    }

    public function loadTravel($language)
    {
        if ($language == 'vi') {
            $language_id = 1;
            $constants = Config::get('constants.vi');
        } else {
            $language_id = 2;
            $constants = Config::get('constants.en');
        }

        $title = PageTitle::where('language_id', $language_id)->where('page_id', 3)
            ->orderByRaw("RAND()")->first();

        $menus = Menu::with('submenus')
            ->where('language_id', $language_id)
            ->orderBy('order', 'asc')
            ->get();
        $contact = ContactDetail::where('language_id', $language_id)->first();
        $new = News::where('language_id', $language_id)->where('hash_tag','thongtindulich')->orderBy('created_date','desc')->take(10)->get();
        return View::make('news', array('constants' => $constants,'menus' => $menus, 'contact' => $contact,  'news' => $new, 'title' =>$title));
    }
    public function loadFood($language)
    {
        if ($language == 'vi') {
            $language_id = 1;
            $constants = Config::get('constants.vi');
        } else {
            $language_id = 2;
            $constants = Config::get('constants.en');
        }

        $title = PageTitle::where('language_id', $language_id)->where('page_id', 3)
            ->orderByRaw("RAND()")->first();

        $menus = Menu::with('submenus')
            ->where('language_id', $language_id)
            ->orderBy('order', 'asc')
            ->get();
        $contact = ContactDetail::where('language_id', $language_id)->first();
        $new = News::where('language_id', $language_id)->where('hash_tag','amthuc')->orderBy('created_date','desc')->take(10)->get();
        return View::make('news', array('constants' => $constants,'menus' => $menus, 'contact' => $contact,  'news' => $new, 'title' =>$title));
    }
}
