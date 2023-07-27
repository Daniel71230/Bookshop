<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function save(Request $request){
        if(Auth::check()){
            return view('/genres');
        }
        if($request->password!==$request->password_confirmation){
            return redirect('register')->withErrors(["msg" => "Passwords don't match!"]);
        }
        $user = User::create(['name'=> $request->name, 'email'=> $request->email, 'password'=> Hash::make($request->password), 'role'=> $request->role,]);
    

            auth()->login($user);
            echo '<script>alert("Successful registration!")</script>';
            return redirect('/');
        
        return redirect(route('register'))->withErrors([
            'formError' =>  'Invalid registration!'
        ]);
    }
}
