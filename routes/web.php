<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formController;
use App\Http\Controllers\adminController;

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

Route::get('/',[formController::class,'links'])->name('links');
Route::get('form',[formController::class,'index'])->name('form');
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [adminController::class,'index'])->name('home');
    Route::get('/home/filter',[adminController::class,'index'])->name('filter');


    Route::post('/home/form/reject/{id}',[adminController::class,'rejectForm'])->name('form.reject');
    Route::post('/home/form/accept/{id}',[adminController::class,'acceptForm'])->name('form.accept');
    Route::get('/home/form/delete/{id}',[adminController::class,'deleteForm'])->name('form.delete');


});
Route::post('form/store',[formController::class,'store'])->name('send.form');