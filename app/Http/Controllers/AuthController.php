<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use Hash;

class AuthController extends Controller
{
    function showFormLogin(Type $var = null)
    {
        if(Auth::check()){
            return redirect('/dashboard');
        }
        return view('login');
    }

    function login(Request $request)
    {
        $all = $request->all();
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/login')
                ->withErrors($validator)
                ->withInput();
        }
        $username = $request->input('username');
        $password = $request->input('password');
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            return redirect()->route('dashboard');
        } else {
            Session::flash('error', 'Username or Password is incorrect');
            return redirect()->route('login');
        }
    }

    function logout(Request $request)
    {
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        Session::flush();
        $request->session()->regenerate();
        Auth::logout();
        return redirect()->route('login');
    }



}
