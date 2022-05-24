<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\PrescriptionController;
use App\Http\Controllers\Admin\RoleController;
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

        /* Doctor Section */
        Route::get('doctor/index', [DoctorController::class, 'index'])->name('index.doctor');
        Route::get('doctor/show/{id}', [DoctorController::class, 'show']);
        Route::get('doctor/create', [DoctorController::class, 'create'])->name('create.doctor');
        Route::POST('doctor/store', [DoctorController::class, 'store'])->name('store.doctor');
        Route::get('doctor/edit/{id}', [DoctorController::class, 'edit'])->name('edit.doctor');
        Route::POST('doctor/update/{id}', [DoctorController::class, 'update'])->name('update.doctor');
        Route::get('doctor/booking', [DoctorController::class, 'booking'])->name('booking.doctor');
        Route::get('doctor/update/status/{id}', [DoctorController::class, 'updateStatus'])->name('update.status');
        Route::POST('doctor/delete/{id}', [DoctorController::class, 'destroy']);

        /* Role Section */
        Route::get('role/index',[RoleController::class,'index'])->name('role.index');
        Route::get('role/create',[RoleController::class,'create'])->name('role.create');
        Route::POST('role/store',[RoleController::class,'store'])->name('role.store');
        Route::get('role/edit/{id}',[RoleController::class,'edit'])->name('role.edit');
        Route::POST('role/update/{id}',[RoleController::class,'update'])->name('role.update');
        Route::POST('role/delete/{id}',[RoleController::class,'delete'])->name('role.delete');

        /* Appointment Section */
        Route::get('appoint/index',[AppointmentController::class,'index'])->name('appoint.index');
        Route::POST('appoint/check',[AppointmentController::class,'check'])->name('appoint.check');
        Route::get('appoint/create',[AppointmentController::class,'create'])->name('appoint.create');
        Route::POST('appoint/store',[AppointmentController::class,'store'])->name('appoint.store');
        Route::POST('appoint/update',[AppointmentController::class,'update'])->name('appoint.update');

        /* Prescription Section*/
        Route::get('patient-today',[PrescriptionController::class,'index'])->name('patient');
        Route::POST('prescription/store',[PrescriptionController::class,'prescrStore'])->name('prescription.store');
        Route::get('prescription/view/{id}',[PrescriptionController::class,'prescrView'])->name('prescription.view');
        Route::get('prescription/edit/{id}',[PrescriptionController::class,'prescrEdit'])->name('prescription.edit');
        Route::POST('prescription/save/edit/{id}',[PrescriptionController::class,'saveEdit']);
    });
});
