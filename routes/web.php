<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('locale/{locale}',[GenreController::class, 'changeLocale'])->name('locale');
Route::middleware(['set_locale'])->group(function(){
    Route::redirect('/', 'genre')->name('main');
Route::resource('genre', GenreController::class);
Route::resource('book', BookController::class, ['except' => [
'create']]);
Route::resource('review', ReviewController::class, ['except' => [
'create']]);
Route::get('genre/create/', [GenreController::class, 'create']);
Route::get('book/genre/{id}', [BookController::class, 'index']);
Route::get('book/genre/{id}/create', [BookController::class, 'create']);
Route::get('book/genre/{id}/update', [BookController::class, 'update']);
Route::get('book/genre/{id}/edit', [BookController::class, 'edit']);
Route::get('userbooks/{id}', [BookController::class, 'buy']);
Route::get('stripe/{price}/{id}', [BookController::class, 'stripe'])->name('stripe');
Route::post('stripe/{price}/{id}', [BookController::class, 'stripePost'])->name('stripe.post');
Route::get('review/book/{id}', [ReviewController::class, 'index']);
Route::get('review/book/{id}/create', [ReviewController::class, 'create']);
Route::get('userbooks', [AdminController::class, 'viewBooks']);
Route::post('/add_cart/{id}', [BookController::class, 'add_cart']);
});
Route::get('/show_cart', [BookController::class, 'show_cart']);
Route::get('/remove_cart/{id}', [BookController::class, 'remove_cart']);
Route::get('/cash_order', [BookController::class, 'cash_order']);


Route::get('/login', function(){
    if(Auth::check()){
        return redirect('/');
    }
    return view('login');
})->name('login');
Route::get('admin', [AdminController::class, 'viewBooks'])->name('vbooks');
Route::put('admin', [AdminController::class, 'store'])->name('astore');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', function(){
    Auth::logout();
    return redirect('');
})->name('logout');
Route::get('/register', function(){
    if(Auth::check()){
        return redirect(route('main'));
    }
    return view('register');
})->name('register');
Route::post('/register ', [RegisterController::class, 'save']);
