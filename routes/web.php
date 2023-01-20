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

Route::redirect('/', 'form', 301);;
Route::get('form',[formController::class,'index'])->name('form');
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [adminController::class,'index'])->name('home');
    Route::get('/home/filter',[adminController::class,'index'])->name('filter');
});
Route::post('form/store',[formController::class,'store'])->name('send.form');

