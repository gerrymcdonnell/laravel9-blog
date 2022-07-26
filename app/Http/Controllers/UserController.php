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


    public function login(){
        return view('users.login');
    }


    public function authenticate(Request $request){

        $formFields=$request->validate([            
            'email'=>['required','email'],
            'password'=>'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message','you are logged in');
        }

        return back()->withErrors(['email'=>'invalid credentials'])->onlyInput('email');
    }


}
