<?php

use Automail\Contact\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/contact', [ContactController::class,'index']);

Route::post('/contact-store', [ContactController::class,'send'])->name('contact');
