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
        $booking->adult = ($adult == null) ? 0 : $adult;
        $booking->child = ($child == null) ? 0 : $child;
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
            $room = Room::where('language_id', $language_id)->where('id', $roomId)->first();

            if ($booking != null) {
                $booking->room_id = $roomId;
                if(($booking->check_in != null) && ($booking->check_out != null)){
                    $totalDay = $booking->check_out->diffInDays($booking->check_in);
                    $booking->total_money =$totalDay * ($room->price);
                }
                
            } else {
                $booking = new BookingRoom();
                $booking->room_id = $roomId;
            }
            Session::put('booking', $booking);
            
            return Response::json(['success' => true, 'room' => $room, 'booking' => $booking]);
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
                $booking->address = 'Unknow';
                //validate
                $booking_id = uniqid();
                $room_id = $booking->room_id;
                $total_room = $booking->total_room;
                $full_name = $booking->full_name;
                $email = $booking->email;
                $phone = $booking->phone;
                $check_in = $booking->check_in;
                $check_out = $booking->check_out;
                $address = $booking->address;
                $adult = $booking->adult ;
                $child = $booking->child ;
                $total_money = $booking->total_money;

                // save booking
                $booking_room = BookingRoom::create();
                $booking_room->room_id = $room_id;
                $booking_room->booking_id = $booking_id;
//                $booking_room->total_room = $total_room == 0 ? 1 : $total_room;
                $booking_room->full_name = $full_name;
                $booking_room->address = $address;
                $booking_room->phone = $phone;
                $booking_room->email =  $email;

                $booking_room->adult = $adult ;
                $booking_room->child = $child ;

                $booking_room->check_in = $check_in;
                $booking_room->check_out = $check_out;

                $booking_room->total_money = $total_money;

                $booking_room->created_date = Carbon::now();
                $booking_room->save();


                $room = Room::where('language_id', $language_id)->where('id', $room_id)->get();
                $data = array('constants' => $constants, 'booking' => $booking_room, 'rooms' => $room);

                // sent mail to admin
                $mail_from = 'contact@pearlseahotel.com';
                $reception_mail_address = Config::get('constants.admin.reception_email');
                $main_mail_address = Config::get('constants.admin.main_email');

                // sent mail to main account
                Mail::send('booking_mail', $data, function ($message) use ($main_mail_address, $mail_from) {
                    $message->from($mail_from, 'Pearl Sea Hotel');
                    $message->to($main_mail_address)->subject('Khách hàng đặt phòng');
                });

                // sent mail to reception
                Mail::send('booking_mail', $data, function ($message) use ($reception_mail_address, $mail_from) {
                    $message->from($mail_from, 'Pearl Sea Hotel');
                    $message->to($reception_mail_address)->subject('Khách hàng đặt phòng');
                });

                // sent mail to customer
                Mail::send('booking_mail', $data, function ($message) use ($email, $mail_from) {
                    $message->from($mail_from, 'Pearl Sea Hotel');
                    $message->to($email)->subject('Đặt phòng tại Pearl sea hotel!');
                });
                Session::forget('booking');
            }
            return Response::json(['success' => true, 'booking' => $booking_room, 'room' => $room]);
        }
    }

    public function userInfo(\Illuminate\Http\Request $request)
    {
        // Getting all post data
        $language = Session::get('lang');
        if ($language == 'vi') {
            $language_id = 1;
        } else {
            $language_id = 2;
        }
        if (Request::ajax()) {
            $checkin = $request->input('checkin');
            $checkout = $request->input('checkout');
            $adult = $request->input('adult');
            $child = $request->input('child');
            $firstname = $request->input('firstname');
            $lastname = $request->input('lastname');
            $email1 = $request->input('email1');
            $email2 = $request->input('email2');
            $phone = $request->input('phone');

            $booking = Session::get('booking');
            if ($booking == null) {
                return Response::json(['success' => false, 'data' => 'Booking error!']);
            } else {
                $booking->check_in =   $booking->check_in = Carbon::createFromFormat('d/m/Y', $checkin);
                $booking->check_out = Carbon::createFromFormat('d/m/Y', $checkout);
                $booking->adult = $adult;
                $booking->child = $child;
                $booking->full_name = $firstname . ' ' . $lastname;
                $booking->email = $email1;
                $booking->phone = $phone;
            }

            $room = Room::where('language_id', $language_id)->where('id', $booking->room_id)->first();
             if(($booking->check_in != null) && ($booking->check_out != null)){
                    $totalDay = $booking->check_out->diffInDays($booking->check_in);
                    $booking->total_money =$totalDay * ($room->price);
                }
           
            Session::put('booking', $booking);
            return Response::json(['success' => true, 'room' => $room, 'booking' => $booking]);
        }
    }
}
