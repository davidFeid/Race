<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\InsurerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\RacetrackRecordController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\PDFController;

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



//Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

//Race
Route::resource('races', RaceController::class)->middleware('auth');
Route::get('racePage/{id}', [App\Http\Controllers\RaceController::class, 'racePage'])->name('racePage');
Route::get('allRaces', [App\Http\Controllers\RaceController::class, 'allRace']);
Auth::routes();


//Insurers
Route::resource('insurers', InsurerController::class)->middleware('auth');
Auth::routes();


//Sponsors
Route::resource('sponsors',SponsorController::class)->middleware('auth');
Auth::routes();


//Paypal
Route::controller(PaypalController::class)->group(function(){
    Route::get('/checkout', 'Index')->name('paymentindex');
    Route::post('/request-payment', 'RequestPayment')->name('requestpayment');
    Route::get('/payment-success', 'PaymentSuccess')->name('paymentsuccess');
    Route::get('/payment-cancel', 'PaymentCancel')->name('paymentCancel');
});

//Image/File
Route::get('dropzone', [DropzoneController::class, 'dropzone']);
Route::post('dropzone/store', [DropzoneController::class, 'dropzoneStore'])->name('dropzone.store');


//Runners
Route::get('runnerForm/{id}', [App\Http\Controllers\RacetrackRecordController::class, 'runnerForm'])->name('runnerForm');
Route::post('runnerForm/registro/dni/check', [App\Http\Controllers\RacetrackRecordController::class, 'checkRunnerForm'])->name('runnerCheckDni');
Route::get('runnerForm/registro/dni/store', [App\Http\Controllers\RacetrackRecordController::class, 'storeRunnerForm'])->name('runnerStoreDni');
Route::post('runnerForm/registro/register/check', [App\Http\Controllers\RacetrackRecordController::class, 'checkRunnerRegister'])->name('runnerCheckRegister');
Route::get('runnerForm/registro/register/store', [App\Http\Controllers\RacetrackRecordController::class, 'storeRunnerRegister'])->name('runnerStoreRegister');
Route::post('runnerForm/registro/total', [App\Http\Controllers\RacetrackRecordController::class, 'storeRunnerRegister']);

/* //Racetrack-record
Route::get('racetrack-record/{id}/{dni}/', [App\Http\Controllers\RacetrackRecordController::class, 'racetrack-record']); */


//pdf
Route::get('generate-pdf', [PDFController::class, 'generatePDF'])->name('generatePDF');
