<?php

use Illuminate\Support\Facades\Route;

Route::get('/sales', function () {
    return view('sales');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/category/{category}', function ($category) {
    return view('products', ['category' => $category]);
});

Route::get('/user/{id}/name/{name}', function ($id, $name) {
    return view('user', ['id' => $id, 'name' => $name]);
});



