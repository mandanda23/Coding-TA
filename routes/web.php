<?php

use App\Http\Controllers\tesbrowsing;
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

    return view('home', ["title" => "Home"]);
});


Route::get('/about', function () {
    return view('about', ["title" => "About",]);
});
Route::get('/tesbrowsing', [tesbrowsing::class, 'isi']);
Route::get('/tesbrowsingKabupaten/{kabupaten}', [tesbrowsing::class, 'isiKabupaten']);
Route::get('/tesbrowsingKecamatan/{kecamatan}', [tesbrowsing::class, 'isiKecamatan']);
Route::get('/tesbrowsingDesa/{desa}', [tesbrowsing::class, 'isiDesa']);
Route::get('/tesbrowsingBanjar/{banjar}', [tesbrowsing::class, 'isiBanjar']);


Route::get('/detailpura/{nama_pura}', [detailpura::class, 'read']);
Route::get('/searching', [SearchingController::class, 'index']);
Route::get('/readmore/{nama_pura}', [readmore::class, 'detail']);
Route::get('/lihat', [lihat::class, 'lihat']);

Route::get('/browsing', [browsing::class, 'isi']);
Route::get('/browsingKabupaten/{kabupaten}', [browsing::class, 'isiKabupaten']);
Route::get('/browsingKecamatan/{kecamatan}', [browsing::class, 'isiKecamatan']);
Route::get('/browsingDesa/{desa}', [browsing::class, 'isiDesa']);
Route::get('/browsingBanjar/{banjar}', [browsing::class, 'isiBanjar']);
