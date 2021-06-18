<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\BandaController;
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
/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/artista', function () {
    return view('artista.index');
});
Route::get('/artista/create',[ArtistaController::class,'create']);
*/
Route::resource('artista',ArtistaController::class)->middleware('auth');
Route::resource('banda',BandaController::class)->middleware('auth');
Auth::routes(['register'=>true,'reset'=>true]);

Route::get('/home', [ArtistaController::class, 'index'])->name('home');
    
Route::group(['middleware' => 'auth'], function () {
      
    Route::get('/', [ArtistaController::class, 'index'])->name('home');
});