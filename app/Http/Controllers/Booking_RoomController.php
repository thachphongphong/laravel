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
use Mail;

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
            if ($booking != null) {
                $booking->room_id = $roomId;
            } else {
                $booking = new BookingRoom();
                $booking->room_id = $roomId;
            }
            Session::put('booking', $booking);
            $room = Room::where('language_id', $language_id)->where('id', $roomId)->get();
            return Response::json(['success' => true, 'data' => $room]);
        }
    }


    public function makeBooking(\Illuminate\Http\Request $request)
    {
        // Getting all post data
        $language = Session::get('lang');
        if ($language == 'vi') {
            $language_id = 1;
            $constants = Config::get('constants.vi');
        } else {
            $language_id = 2;
            $constants = Config::get('constants.en');
        }
        if (Request::ajax()) {
            $booking = Session::get('booking');
            if ($booking != null) {

                //mock session to booking
                $booking->booking_id = uniqid();
                $booking->room_id = 1;
                $booking->total_room = 2;
                $booking->full_name = 'Le test';
                $booking->address = 'Da nang, viet nam';
                $booking->email = 'testeraxon@gmail.com';
                $booking->phone = '012398838';
                $booking->check_in = '06/Oct/2016';
                $booking->check_out = '08/Oct/2016';

                //validate
                $booking_id = uniqid();
                $room_id = $booking->room_id;
                $total_room = $booking->total_room;
                $full_name = $booking->full_name;
                $address = $booking->address;
                $email = $booking->email;
                $phone = $booking->phone;
                $check_in = $booking->check_in;
                $check_out = $booking->check_out;

//                if ($room_id == null || $room_id == 0 || $room_id == "") return Response::json(['success' => false, 'data' =>
//                    '$room_id']);
//                if ($total_room == null || $total_room == 0 || $total_room == "") return Response::json(['success' => false, 'data' =>
//                    '$total_room']);
//                if ($email == null || $email == 0 || $email == "") return Response::json(['success' => false, 'data' =>
//                    '$email']);
//                if ($check_in == null || $check_in == 0 || $check_in == "") return Response::json(['success' => false, 'data' =>
//                    '$check_in']);
//                if ($check_out == null || $check_out == 0 || $check_out == "") return Response::json(['success' => false, 'data' =>
//                    '$check_out']);


                // save booking
                $booking_room = BookingRoom::create();
                $booking_room->room_id = $room_id;
                $booking_room->booking_id = $booking_id;
                $booking_room->total_room = $total_room;
                $booking_room->full_name = $full_name;
                $booking_room->address = $address;
                $booking_room->phone = $phone;

                //convert string date to datetime
                $check_in_date = date_create_from_format('d/M/Y', $check_in);
                $check_in_date->getTimestamp();

                //convert string date to datetime
                $check_out_date = date_create_from_format('d/M/Y', $check_out);
                $check_out_date->getTimestamp();

                $booking_room->check_in = $check_in_date;
                $booking_room->check_out = $check_out_date;

                $booking_room->created_date = Carbon::now();
                $booking_room->save();


                $room = Room::where('language_id', $language_id)->where('id', $room_id)->get();
                $data = array('constants' => $constants, 'booking' => $booking_room, 'rooms' => $room);

                // sent mail to admin
                Mail::send('booking_mail', $data, function ($message) use ($email) {
                    $message->from('contact@pearlseahotel.com', 'Pearl Sea Hotel');
                    $message->to('contact@pearlseahotel.com')->subject('Your have booked rooms at Pearl sea hotel!');
                });

                // sent mail to customer
                Mail::send('booking_mail', $data, function ($message) use ($email) {
                    $message->from('contact@pearlseahotel.com', 'Pearl Sea Hotel');
                    $message->to($email)->subject('??t phòng t?i Pearl sea hotel!');
                });
            }
            return Response::json(['success' => true, 'data' => 'ok']);
        }
    }
}
