<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;

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

Route::get('/', [HomeController::class,'index']);

Route::get('/home', [HomeController::class,'redirect']);

Route::get('/add_doctors', [AdminController::class,'add_view'])->name('add-view');

Route::post('/add_doctors_form', [AdminController::class,'store_doctors'])->name('add-doctors-form');

Route::post('/appointments', [AdminController::class,'appointments'])->name('appointments');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get( '/about', [ PageController::class, 'about' ] )->name('about-page');
Route::get('/make-appointment', [HomeController::class,'make_appointment'])->name('make-appointment');
Route::get( '/doctors', [ PageController::class, 'doctors' ] )->name('doctors');
Route::get( '/my-appointments', [ PageController::class, 'myAppointments' ] )->name('my-appointments');