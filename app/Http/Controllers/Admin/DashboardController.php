<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use View;
use App\ContactDetail;
use App\Menu;
use App\Message;
use Config;
use DB;
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
        return View::make('auth.admin.dashboard', array('contact' => $contact));
    }

    public function loadContact($language,$language_code)
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
}
