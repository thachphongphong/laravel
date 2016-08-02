<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

class LoginController extends Controller
{
    public function load()
    {
        return View::make('auth.login');
    }
    public function login()
    {
        return View::make('auth.register');
    }
    public function forgot()
    {
        return View::make('auth.passwords.email');
    }
    public function reset()
    {
        return View::make('auth.passwords.reset');
    }
    public function update()
    {
        return View::make('auth.login');
    }
}
