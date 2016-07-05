<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Local_FoodController extends Controller
{
    public function load()
    {
        $string = "Load Local_FoodController";
        return $string;
    }
}
