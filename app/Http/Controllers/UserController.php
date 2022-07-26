<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //
    //show creat form
    public function create(){
        return view('users.register');
    }

    //save the user
    public function store(Request $request){
        
        $formFields=$request->validate([
                'name'=>['required','min:3'],
                'email'=>['required','email',Rule::unique('users','email')],
                'password'=>'required|confirmed|min:6'
        ]);

        //has password
        $formFields['password']=bcrypt($formFields['password']);

        $user=User::create($formFields);

        auth()->login($user);

        return redirect ('/')->with('message','created');
    }


    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','loggedout');
    }


}
