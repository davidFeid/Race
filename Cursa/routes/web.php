<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\InsurerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\RacetrackRecordController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\FileUploadController;


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


//Paypal
Route::controller(PaypalController::class)->group(function(){
    Route::get('/checkout', 'Index')->name('paymentindex');
    Route::post('/request-payment', 'RequestPayment')->name('requestpayment');
    Route::get('/payment-success', 'PaymentSuccess')->name('paymentsuccess');
    Route::get('/payment-cancel', 'PaymentCancel')->name('paymentCancel');
});

//Image/File
Route::get('upload-ui', [FileUploadController::class, 'dropzoneUi' ]);
Route::post('file-upload', [FileUploadController::class, 'dropzoneFileUpload' ])->name('dropzoneFileUpload');

//Runners
Route::get('runnerForm/{id}', [App\Http\Controllers\RaceController::class, 'runnerForm']);
Route::post('runnerForm/dni', [App\Http\Controllers\RaceController::class, 'storeRunnerForm']);
Auth::routes();