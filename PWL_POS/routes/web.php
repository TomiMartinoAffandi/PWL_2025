<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\levelController;

Route::get('/', function(){
    return view('welcome');
});

Route::get('/level', [levelController::class, 'index']);