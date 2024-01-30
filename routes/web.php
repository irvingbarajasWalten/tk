<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StartController;
use App\Http\Controllers\EventController;


//Start routes
Route::get('/',[StartController::class,'index']);
Route::get('/autocomplete',[StartController::class,'getAutocomplete']);
//Start routes

//Event routes
Route::get('/event',[EventController::class,'index'])->name('events');
Route::get('/event/list',[EventController::class,'getEvents'])->name('events-get');
//Event routes