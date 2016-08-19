<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\News;
use App\Room;
use Carbon\Carbon;
use View;
use App\ContactDetail;
use Config;
use Mail;
use Response;
use Request;

class DashboardController extends Controller
{
    public function load()
    {
        $language = 'vi';
        if ($language == 'vi') {
            $language_id = 1;
        } else {
            $language_id = 2;
        }

        $contact = ContactDetail::where('language_id', $language_id)->first();
        $rooms = Room::all();

        return View::make('auth.admin.dashboard', array('contact' => $contact, 'rooms' => $rooms));
    }

    public function loadContact($language, $language_code)
    {
        $language = $language_code;
        if ($language == 'vi') {
            $language_id = 1;
        } else {
            $language_id = 2;
        }

        $contact = ContactDetail::where('language_id', $language_id)->first();
        return Response::json(['success' => true, 'data' => $contact]);
    }

    public function updateContact(\Illuminate\Http\Request $request)
    {
        if (Request::ajax()) {
            $id = $request->input('id');
            $name = $request->input('name');
            $email = $request->input('email');
            $telephone = $request->input('telephone');
            $phone = $request->input('phone');
            $address = $request->input('address');

            $contact_detail = ContactDetail::find($id);
            $contact_detail->name = $name;
            $contact_detail->email_to = $email;
            $contact_detail->telephone = $telephone;
            $contact_detail->phone = $phone;
            $contact_detail->address = $address;
            $contact_detail->save();
            return Response::json(['success' => true, 'data' => $contact_detail]);
        }
        return Response::json(['success' => false, 'data' => 'Fail']);
    }

    public function addNews(\Illuminate\Http\Request $request)
    {
        if (Request::ajax()) {
            $title = $request->input('title');
            $image_url = $request->input('image_url');
            $introtext = $request->input('introtext');
            $hash_tag = $request->input('hash_tag');
            $language = $request->input('language');
            $full_text = $request->input('full_text');

            $news = News::create();
            $news->title = $title;
            $news->image_url = $image_url;
            $news->introtext = $introtext;
            $news->hash_tag = $hash_tag;
            $news->alias = $hash_tag;
            $news->language_id = $language;
            $news->fulltext = $full_text;
            $news->created_date = Carbon::now();
            $news->save();
            return Response::json(['success' => true, 'data' => $news]);
        }
        return Response::json(['success' => false, 'data' => 'Fail']);
    }

}
