<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\InsurerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RaceController;


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
Route::resource('races', RaceController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Insurers
Route::resource('insurers', InsurerController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
