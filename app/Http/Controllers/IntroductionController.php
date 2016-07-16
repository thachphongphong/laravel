<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Introduce;
use App\Menu;
use App\ContactDetail;
use Config;
use DB;
use View;

class IntroductionController extends Controller
{
    public function load($language)
    {
        $language_id = 1;
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
        $aboutheader = Introduce::where('language_id', $language_id)->orderByRaw("RAND()")->first();

        $about = Introduce::where('language_id', $language_id)->orderBy('id', 'asc')->get();

        $contact = ContactDetail::where('language_id', $language_id)->first();

        return View::make('about', array('constants' => $constants, 'menus' => $menus, 'contact' => $contact, 'abouts' => $about, 'aheaders' =>$aboutheader));
    }
}
