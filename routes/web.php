<?php

use App\Http\Controllers\User\PrescriptionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
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



Route::get('/',[UserController::class,'welcome'])->name('welcome');


Auth::routes();

Route::prefix('user')->name('user.')->group(function (){
    Route::middleware(['auth:web','preventBackHistory'])->group(function (){

        Route::get('home', [HomeController::class, 'index'])->name('home');
        Route::get('reservation/appoint/{id}', [UserController::class, 'reservation']);
        Route::POST('make/appoint', [UserController::class, 'makeAppoint'])->name('make.appoint');
        Route::get('my/booking',[UserController::class,'myBooking'])->name('my.booking');

        /*** Profile Section ***/
        Route::get('profile',[ProfileController::class,'profile'])->name('profile');
        Route::POST('profile/store/{id}',[ProfileController::class,'store'])->name('profile.store');
        Route::POST('profile/picture/{id}',[ProfileController::class,'profilePic'])->name('profile.pic');

        /* Prescription Section*/
        Route::get('prescription/view/{id}',[PrescriptionController::class,'prescrView'])->name('prescription.view');

    });
});




