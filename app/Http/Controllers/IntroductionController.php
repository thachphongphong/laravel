<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IntroductionController extends Controller
{
    public function load()
    {
        $string = "Load IntroductionController";
        return $string;
    }
}
