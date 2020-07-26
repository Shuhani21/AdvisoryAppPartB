<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginSession extends Controller
{
    function index(Request $req)
    {
        // return $req->input();
        $req->session()->put('data', $req->input());
        return redirect('home')->with('data',$req->session()->get('data'));
    }
}
