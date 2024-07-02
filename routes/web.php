<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class,'index'])->name('index');
Route::post('/url/store', [UrlController::class,'store'])->name('url.store');
Route::get('/r/{hash}', [UrlController::class,'redirect'])->name('url.redirect');
