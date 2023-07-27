<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserBooks;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /*public function __construct() {
        //sākumā pārbaudām vai lietotājs ir autentificēts, tad - vai ir admins
        $this->middleware(['auth', 'auth.admin']);
    }*/

    public function viewBooks(){
        if(Auth::check() && auth()->user()->role=='admin'){
        $books = Userbooks::all();
        return view('userbooks', compact('books'));
    }
    return redirect('/');
    }

}
