<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use View;

class LoginController extends Controller
{
    public function load()
    {
        return View::make('auth.login');
    }

    public function login()
    {
        // Getting all post data
        $data = Input::all();
        // Applying validation rules.
        $rules = array(
            'username' => 'required|min:6|max:50',
            'password' => 'required|min:8',
        );
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            // If validation falis redirect back to login.
            return Redirect::to('vi/admin')->withInput(Input::except('password'))->withErrors($validator);
        } else {
            $userdata = array(
                'username' => Input::get('username'),
                'password' => Input::get('password')
            );
            // doing login.
            if (Auth::validate($userdata)) {
                if (Auth::attempt($userdata)) {
                    return Redirect::intended('vi/admin/dashboard');
                }
            } else {
                // if any error send back with message.
                Session::flash('error', 'Tên đăng nhập hoặc mật khẩu không đúng!');
                return Redirect::to('vi/admin');
            }
        }
    }

    public function logout()
    {
        Auth::logout(); // logout user
        return Redirect::to('vi/admin'); //redirect back to login
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
