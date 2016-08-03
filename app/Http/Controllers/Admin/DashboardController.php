<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

class DashboardController extends Controller
{
    public function load()
    {
        return View::make('auth.admin.dashboard');
    }
}
