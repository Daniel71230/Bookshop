<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;
use App;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::all();
        return view('genres', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check() && auth()->user()->role=='admin'){
        return view('genre_new');}
        return redirect('genre/')->withErrors(['msg' => 'This option is for admins only!']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $genre = new Genre();
        $genre->name = $request->name;
        $genre->save();
        return redirect('genre/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::check() && auth()->user()->role=='admin'){
        Genre::findOrFail($id)->delete();
        return redirect('genre/');}
        return redirect('genre/')->withErrors(['msg' => 'This option is for admins only!']);
    }
    public function changeLocale($locale)
    {
        session(['locale'=>$locale]);
        App::setlocale($locale);
        return redirect()->back();
    }
}
