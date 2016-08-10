<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use Session;
use Response;
use Config;

class UploadImageController extends Controller
{
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
                return Response::json(['success' => true, 'data' => $destinationPath . '/' . $fileName]);

            } else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Response::json(['success' => false, 'data' => "fail"]);
            }
        }
    }
}