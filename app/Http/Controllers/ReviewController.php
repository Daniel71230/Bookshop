<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $reviews=Review::where('book_id','=',$id)->get();
        return view('reviews',['book_id'=>$id,'reviews'=> $reviews]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $book = Book::findOrFail($id);
        
        if(Auth::check()){
            $user_id=auth()->user()->id;
            $username=auth()->user()->name;
        return view('review_new',['user_id'=>$user_id,'username'=>$username],compact('book'));
        }
        return redirect('review/book/' . $book->id)->withErrors(['msg' => 'This option is for authentificated users only!']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review= new Review();
        $review->user_id = $request->user_id;
        $review->book_id = $request->book_id;
        $review->text = $request->text;
        $review->username = $request->username;
        $review->save();
        return redirect('review/book/' . $review->book_id);
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
        $book_id = Review::findOrFail($id)->book_id;
        $user_id = Review::findOrFail($id)->user_id;
        if(Auth::check() && (auth()->user()->role=='admin' || auth()->user()->id==$user_id)){
       Review::findOrFail($id)->delete();
        return redirect('review/book/' . $book_id);}
        return redirect('review/book/' . $book_id)->withErrors(['msg' => 'This option is for admins or review authors only!']);
    }
}
