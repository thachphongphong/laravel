<?php

namespace App\Http\Controllers\Admin;

use App\BookingRoom;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Response;
use Request;

class BookingController extends Controller
{
    function load()
    {
        $booking_rooms = BookingRoom::with('room')->orderBy('check_in','asc')->orderBy('room_id','asc')->paginate(10);
        if (Request::ajax()) {
            return Response::json(View::make('auth.admin.booking', array('booking_rooms' => $booking_rooms))->render());
        }
    }

    function delete($language, $id)
    {
        $booking_rooms = BookingRoom::find($id);
        $booking_rooms->delete();
        $booking_rooms = BookingRoom::with('room')->orderBy('check_in','asc')->orderBy('room_id','asc')->paginate(10);;
        if (Request::ajax()) {
            return Response::json(View::make('auth.admin.booking', array('success' => false,'booking_rooms' => $booking_rooms))->render());
        }
    }
}
