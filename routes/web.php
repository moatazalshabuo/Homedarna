<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('property',App\Http\Controllers\PropertyController::class)->middleware('auth');

Route::controller(App\Http\Controllers\PropertyController::class)->group(function(){
    Route::get('property/change-status/{id}','changeStatus')->name('changestatus')->middleware('auth');
    Route::get('properties','properties')->name('properties');
    Route::get('property/delete/{id}','destroy')->name('property.delete')->middleware('auth');
});