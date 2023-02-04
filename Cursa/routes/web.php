<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\InsurerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\SponsorController;



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
    return view('welcome');
});

//Race
Route::resource('races', RaceController::class)->middleware('auth');
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Insurers
Route::resource('insurers', InsurerController::class)->middleware('auth');
Auth::routes();


//Sponsors
Route::resource('sponsors',SponsorController::class)->middleware('auth');
Auth::routes();


//Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
