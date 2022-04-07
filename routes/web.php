<?php

use App\Http\Controllers\browsing;
use App\Http\Controllers\detailpura;
use App\Http\Controllers\lihat;
use App\Http\Controllers\readmore;
use App\Http\Controllers\SearchingController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {

    return view('Home', ["title" => "Home"]);
});


Route::get('/about', function () {
    return view('About', [
        "title" => "About",
        "nama" => "acintia udayana",
        "email" => "udayana@gmail.com",
        "gambar" => "1.jpg"
    ]);
});

Route::get('/detailpura/{nama_pura}', [detailpura::class, 'read']);
Route::get('/browsing', [browsing::class, 'isi']);
Route::get('/searching', [SearchingController::class, 'index']);
Route::get('/readmore/{nama_pura}', [readmore::class, 'detail']);
Route::get('/lihat', [lihat::class, 'lihat']);
