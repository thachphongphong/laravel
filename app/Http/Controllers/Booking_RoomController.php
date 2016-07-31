<?php

namespace App\Http\Controllers;

use App\BookingRoom;
use App\ContactDetail;
use App\Menu;
use App\PageTitle;
use App\Room;
use Carbon\Carbon;
use Config;
use Response;
use Request;
use Illuminate\Support\Facades\Session;
use View;

class Booking_RoomController extends Controller
{
    /**
     * @param $language
     * @return mixed
     */
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

        $title = PageTitle::where('language_id', $language_id)->where('page_id', 1)
            ->orderByRaw("RAND()")->first();

        $contact = ContactDetail::where('language_id', $language_id)->first();

        return View::make('booking', array('constants' => $constants, 'menus' => $menus, 'contact' => $contact, 'title' => $title));
    }

    public function book($language, $id)
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

        $title = PageTitle::where('language_id', $language_id)->where('page_id', 1)
            ->orderByRaw("RAND()")->first();

        $contact = ContactDetail::where('language_id', $language_id)->first();

        $room = Room::with('roomdetails')->where('language_id', $language_id)->get();

        $booking = new BookingRoom();
        $booking->room_id = $id;
        Session::put('booking', $booking);

        return View::make('booking', array('constants' => $constants, 'menus' => $menus, 'contact' => $contact,
            'title' => $title, 'rooms' => $room, 'booking' => $booking));
    }


    public function search(\Illuminate\Http\Request $request)
    {
        $language = Session::get('lang');
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

        $title = PageTitle::where('language_id', $language_id)->where('page_id', 1)
            ->orderByRaw("RAND()")->first();

        $contact = ContactDetail::where('language_id', $language_id)->first();

        $checkin = $request->input('checkin');
        $checkout = $request->input('checkout');
        $adult = $request->input('adult');
        $child = $request->input('child');

        $booking = new BookingRoom();
        $booking->check_in = Carbon::createFromFormat('d/m/Y', $checkin);
        $booking->check_out = Carbon::createFromFormat('d/m/Y', $checkout);
        $booking->adult = $adult;
        $booking->child = $child;
        Session::put('booking', $booking);

        $room = Room::with('roomdetails')->where('language_id', $language_id)->get();

        return View::make('booking', array('constants' => $constants, 'menus' => $menus, 'contact' => $contact,
            'title' => $title, 'rooms' => $room, 'booking' => $booking));
    }

    public function select(\Illuminate\Http\Request $request)
    {
        // Getting all post data
        $language = Session::get('lang');
        if ($language == 'vi') {
            $language_id = 1;
        } else {
            $language_id = 2;
        }
        if (Request::ajax()) {
            $roomId = $request->input('roomId');;
            $booking = Session::get('booking');
            if($booking != null){
                $booking->room_id = $roomId;
            }else{
                $booking = new BookingRoom();
                $booking->room_id = $roomId;
            }
            Session::put('booking', $booking);
            $room = Room::where('language_id', $language_id)->where('id', $roomId)->get();
            return Response::json(['success'=>true,'data'=>$room]);
        }
    }
}
