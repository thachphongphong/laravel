<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function load($language)
    {
        $language_id = 1;
        if ($language == 'vi') {
            $language_id =1;
        }else{
            $language_id =2;
        }
        $string = "Load Booking_RoomController";
        return $string;
    }
}
