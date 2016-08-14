<?php

namespace App\Http\Controllers\Admin;

use App\Room;
use Request;

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

    public function update(\Illuminate\Http\Request $request)
    {
        if (Request::ajax()) {

            $id = $request->input('id');
            $name = $request->input('name');
            $thumbnail = $request->input('thumbnail');
            $image_url = $request->input('image_url');
            $description = $request->input('description');
            $room_type = $request->input('room_type');
            $total_room = $request->input('total_room');
            $total_person = $request->input('total_person');
            $price = $request->input('price');
            $f_price = $request->input('f_price');
            $rate = $request->input('rate');

            $room = Room::find($id);
            $room->name = $name;
            $room->thumbnail = $thumbnail;
            $room->image_url = $image_url;
            $room->description = $description;
            $room->room_type = $room_type;
            $room->total_room = $total_room;
            $room->total_person = $total_person;
            $room->price = $price;
            $room->f_price = $f_price;
            $room->rate = $rate;

            $room->save();
            return Response::json(['success' => true, 'data' => $room]);
        }
        return Response::json(['success' => false, 'data' => 'Fail']);
    }
}
