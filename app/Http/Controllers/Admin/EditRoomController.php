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

    public function upload(Request $request)
    {
        // getting all of the post data
        $file = array('image' => Input::file('image'));
        // setting up rules
        $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Response::json(['success' => false, 'data' => $validator]);
        } else {
            // checking file is valid.
            if (Input::file('image')->isValid()) {
                $destinationPath = Config::get('constants.admin.imagePath'); // upload path
                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = uniqid() . '.' . $extension; // renameing image
                Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                Session::flash('success', 'Upload successfully');
                return Response::json(['success' => true, 'data' => $destinationPath . '/about/' . $fileName]);

            } else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Response::json(['success' => false, 'data' => "fail"]);
            }
        }
    }
}
