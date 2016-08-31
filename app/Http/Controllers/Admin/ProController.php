<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Response;
use Request;
use Carbon\Carbon;

use App\Promotion;

class ProController extends Controller
{
	function load($language, \Illuminate\Http\Request $request)
    {
    	$language_code = $request->input('lang');
    	if ($language_code == 'vi') {
            $language_id = 1;
        } else {
            $language_id = 2;
        }
        $promotions = Promotion::where('language_id', $language_id)->paginate(10);
        if (Request::ajax()) {
            return Response::json(View::make('auth.admin.promotion', array('promotions' => $promotions))->render());
        }
    }

    public function add(\Illuminate\Http\Request $request)
    {
        if (Request::ajax()) {

            $description = $request->input('description');
            $apply_time_from = $request->input('apply_time_from');
            $apply_time_to = $request->input('apply_time_to');
            $sale_off = $request->input('sale_off');
            $enabled = $request->input('enabled');
            $language_id = $request->input('language_id');

            $promotion = Promotion::create();
            $promotion->description = $description;
            $promotion->apply_time_from = Carbon::createFromFormat('d/m/Y', $apply_time_from);;
            $promotion->apply_time_to = Carbon::createFromFormat('d/m/Y', $apply_time_to);

            $promotion->sale_off = $sale_off;
            $promotion->enabled = $enabled;
            $promotion->language_id = $language_id;
            $promotion->save();
            return Response::json(['success' => true, 'data' => $promotion]);
        }
        return Response::json(['success' => false, 'data' => 'Fail']);
    }

    function delete(\Illuminate\Http\Request $request)
    {
    	 $id = $request->input('id');
    	 $language_id = $request->input('lang');
        $promotion = Promotion::find($id);
        $promotion->delete();
        $promotions = Promotion::where('language_id', $language_id)->paginate(10);
         if (Request::ajax()) {
            return Response::json(View::make('auth.admin.promotion', array('promotions' => $promotions))->render());
        }
    }

     public function edit(\Illuminate\Http\Request $request)
    {
        if (Request::ajax()) {
            $id = $request->input('id');
            if($id != null){
            $promotion = Promotion::find($id);

             $description = $request->input('description');
            $apply_time_from = $request->input('apply_time_from');
            $apply_time_to = $request->input('apply_time_to');
            $sale_off = $request->input('sale_off');
            $enabled = $request->input('enabled');
            $language_id = $request->input('language_id');

             $promotion->description = $description;
            $promotion->apply_time_from = Carbon::createFromFormat('d/m/Y', $apply_time_from);;
            $promotion->apply_time_to = Carbon::createFromFormat('d/m/Y', $apply_time_to);

            $promotion->sale_off = $sale_off;
            $promotion->enabled = $enabled;
            $promotion->language_id = $language_id;
            $promotion->save();
            return Response::json(['success' => true, 'data' => $promotion]);
            }
            
        }
        return Response::json(['success' => false, 'data' => 'Fail']);
    }
}
