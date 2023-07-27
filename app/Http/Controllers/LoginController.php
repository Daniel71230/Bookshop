<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        if(Auth::check()){
            return redirect()->intended(route('main'));
        }
        $formfields=$request->only(['name','password']);
        if(Auth::attempt($formfields)){
            return redirect()->intended('/');
        }
    
    return redirect(route('login'))->withErrors([
        'name' =>  'Invalid login!'
    ]);
    }   
}
