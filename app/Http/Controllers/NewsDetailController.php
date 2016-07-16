<?php

namespace App\Http\Controllers;

use App\ContactDetail;
use App\Http\Requests;
use App\Menu;
use App\News;
use Config;
use DB;
use View;

class NewsDetailController extends Controller
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
        $new = News::where('language_id', $language_id)->where('id',$id)->first();
        return View::make('newsdetail', array('constants' => $constants,'menus' => $menus, 'contact' => $contact,  'news' =>
            $new));
    }
}
