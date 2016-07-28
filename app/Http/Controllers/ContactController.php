<?php

namespace App\Http\Controllers;

use App\ContactDetail;

use App\Menu;
use App\Message;
use Config;
use DB;
use Illuminate\Http\Request;
use Mail;
use View;

class ContactController extends Controller
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
        $menus = Menu::with('submenus')
            ->where('language_id', $language_id)
            ->orderBy('order', 'asc')
            ->get();
        $contact = ContactDetail::where('language_id', $language_id)->first();
        return View::make('contact', array('constants' => $constants, 'menus' => $menus, 'contact' => $contact));
    }

    public function addMessage(Request $request)
    {
        $message_info = $request['message'];
        $message = Message::create();
        $message->name = $message_info['name'];
        $message->email = $message_info['email'];
        $message->title = $message_info['title'];
        $message->content = $message_info['content'];
        $message->save();

        // Send mail to admin
        $data = array('data' => $message);
        Mail::send('contact_mail', $data, function ($message) {
            $message->from('contact@pearlseahotel.com', 'Pearl Sea Hotel');
            $message->to('contact@pearlseahotel.com')->subject('Your Reminder!');
        });

        return $message;
    }


}
