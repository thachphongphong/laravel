<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Response;
use Request;
use Carbon\Carbon;

use App\Tour;

class TourController extends Controller
{
	function load($language, \Illuminate\Http\Request $request)
    {
    	$language_code = $request->input('lang');
    	if ($language_code == 'vi') {
            $language_id = 1;
        } else {
            $language_id = 2;
        }
        $tours = Tour::where('language_id', $language_id)->paginate(10);
        if (Request::ajax()) {
            return Response::json(View::make('auth.admin.tour_section', array('tours' => $tours))->render());
        }
    }

    public function add(\Illuminate\Http\Request $request)
    {
        if (Request::ajax()) {
            $duration = $request->input('duration');
            $departure = $request->input('departure');
            $arrival = $request->input('arrival');
            $price = $request->input('price');
            $note = $request->input('note');
            $imageUrl = $request->input('imageUrl');
            $language_id = $request->input('language_id');

            $tour = Tour::create();
            $tour->duration = $duration;
            $tour->departure = $departure;
            $tour->arrival = $arrival;
            $tour->price = $price;
            $tour->note = $note;
            $tour->imageUrl = $imageUrl;
            $tour->language_id = $language_id;
            $tour->created_date = Carbon::now();
            $tour->save();
            return Response::json(['success' => true, 'data' => $tour]);
        }
        return Response::json(['success' => false, 'data' => 'Fail']);
    }

    function delete(\Illuminate\Http\Request $request)
    {
    	 $id = $request->input('id');
    	 $language_id = $request->input('lang');
        $tour = Tour::find($id);
        $tour->delete();
        $tours = Tour::where('language_id', $language_id)->paginate(10);
         if (Request::ajax()) {
            return Response::json(View::make('auth.admin.tour_section', array('tours' => $tours))->render());
        }
    }

     public function edit(\Illuminate\Http\Request $request)
    {
        if (Request::ajax()) {
            $id = $request->input('id');
            if($id != null){
            $tour = Tour::find($id);

            $duration = $request->input('duration');
            $departure = $request->input('departure');
            $arrival = $request->input('arrival');
            $price = $request->input('price');
            $note = $request->input('note');
            $imageUrl = $request->input('imageUrl');
            $language_id = $request->input('language_id');

            $tour->duration = $duration;
            $tour->departure = $departure;
            $tour->arrival = $arrival;
            $tour->price = $price;
            $tour->note = $note;
            $tour->imageUrl = $imageUrl;
            $tour->language_id = $language_id;
            $tour->created_date = Carbon::now();
            $tour->save();
            return Response::json(['success' => true, 'data' => $tour]);
            }
            
        }
        return Response::json(['success' => false, 'data' => 'Fail']);
    }
}
