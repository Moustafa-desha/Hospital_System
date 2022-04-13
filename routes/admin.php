<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DoctorController;
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

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware(['guest:admin','preventBackHistory'])->group(function (){
        Route::get('login',[AdminController::class,'login'])->name('login');
        Route::POST('check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','preventBackHistory'])->group(function (){

        Route::get('dashboard', function () { return view('admin.dashboard'); });

        Route::POST('logout',[AdminController::class,'logout'])->name('logout');

        Route::get('doctor/index', [DoctorController::class, 'index'])->name('index.doctor');
        Route::get('doctor/show/{id}', [DoctorController::class, 'show']);
        Route::get('doctor/create', [DoctorController::class, 'create'])->name('create.doctor');
        Route::POST('doctor/store', [DoctorController::class, 'store'])->name('store.doctor');
        Route::get('doctor/edit/{id}', [DoctorController::class, 'edit'])->name('edit.doctor');
        Route::POST('doctor/update/{id}', [DoctorController::class, 'update'])->name('update.doctor');
        Route::POST('doctor/delete/{id}', [DoctorController::class, 'destroy']);

    });
});
