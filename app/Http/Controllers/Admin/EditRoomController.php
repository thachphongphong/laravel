<?php

namespace App\Http\Controllers\Admin;

use App\Room;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;

class EditRoomController extends Controller
{
    public function get($language, $id)
    {
        $rooms = Room::with('roomdetails')->where('id', $id)->first();
        return Response::json(['success' => true, 'data' => $rooms]);
    }

    public function gets($language, $language_id)
    {
        $rooms = Room::with('roomdetails')->where('language_id', $language_id)->get();
        return Response::json(['success' => true, 'data' => $rooms]);
    }
}
