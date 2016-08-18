<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Validator;
use Redirect;
use Session;
use Response;
use Config;

class UploadImageController extends Controller
{
    public function upload(\Illuminate\Http\Request $request)
    {
        // getting all of the post data
        $file = array('image' => Input::file('image'));

        $typeName = $request->input('typeName');

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

                if($typeName == 'ABOUT'){
                    $destinationPath = $destinationPath  . '/about';
                }
               
                Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                Session::flash('success', 'Upload successfully');
                return Response::json(['success' => true, 'type' =>  $typeName,'data' => $destinationPath . '/' . $fileName]);

            } else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Response::json(['success' => false, 'data' => "fail"]);
            }
        }
    }

    public function replace(Request $request)
    {
        // getting all of the post data
        $file = array('image' => Input::file('image'));
        $filePath = $request->input('filePath');
        // setting up rules
        $rules = array('image' => 'required'); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Response::json(['success' => false, 'data' => $validator]);
        } else {
            // checking file is valid.
            if (Input::file('image')->isValid()) {

                $xmlFile = pathinfo($filePath);
                $dir = $xmlFile['dirname'];
                $filename = $xmlFile['basename'];
                $img = Image::make(Input::file('image')->getRealPath());
                $img->resize(300, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($dir . '/thumb_' . $filename);

                Input::file('image')->move($dir, $filename); // uploading file to given path
                // sending back with message
                Session::flash('success', 'Upload successfully');

                return Response::json(['success' => true, 'data' => array('img_src' => $filePath, 'img_thumb' => $dir . '/thumb_' . $filename)]);
            } else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Response::json(['success' => false, 'data' => "fail"]);
            }
        }
    }
}
