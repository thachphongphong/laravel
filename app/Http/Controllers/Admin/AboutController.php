<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use View;
use App\Introduce;
use Config;
use DB;
use Response;
use Request;
use File;
use Session;

class AboutController extends Controller
{

     public function introduce($language, $language_code)
    {
        if ($language_code == 'vi') {
            $language_id = 1;
        } else {
            $language_id = 2;
        }

       $abouts = Introduce::where('language_id', $language_id)->orderBy('id', 'asc')->get();
       $returnHTML = view('auth.admin.intro_section')->with('abouts', $abouts)->render();
       return Response::json(['success' => true, 'html'=>$returnHTML]);
    }

    public function saveAbout (\Illuminate\Http\Request $request){
        if (Request::ajax()) {
            $id = $request->input('id');
            $langCode = $request->input('langCode');
            $content = $request->input('content');
        
            $about = Introduce::find($id);
            $about->content = $content;
            $about->save();
            return Response::json(['success' => true, 'data' => $about]);
        }
        return Response::json(['success' => false, 'data' => 'Fail']);
    }

    public function deleteImageAbout (\Illuminate\Http\Request $request){
        $filePath = $request->input('iurl');
        $id = $request->input('id');
        $langCode = $request->input('langCode');

        // checking file is valid.
        if ($filePath !=  '') {
            File::delete($filePath);

            $about = Introduce::find($id);

            $urls = explode(',',  $about->image_url  );
            while(($i = array_search($filePath, $urls)) !== false) {
                unset($urls[$i]);
            }

            $about->image_url = implode(',', $urls);
            $about->save();

            Session::flash('success', 'Delete successfully');
            return Response::json(['success' => true]);
        } else {
            // sending back with error message.
            Session::flash('error', 'uploaded file is not valid');
            return Response::json(['success' => false, 'data' => "fail"]);
        }

    }

     public function addImageAbout (\Illuminate\Http\Request $request){
        if (Request::ajax()) {
            $id = $request->input('id');
            $langCode = $request->input('langCode');
            $imageUrl = $request->input('imageUrl');

            $about = Introduce::find($id);
            $about->image_url  = $about->image_url . ',' . $imageUrl;
            $about->save();

            return Response::json(['success' => true]);
        }
        return Response::json(['success' => false]);
    }

}
