<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    //show creat form
    public function create(){
        return view('users.register');
    }
}
