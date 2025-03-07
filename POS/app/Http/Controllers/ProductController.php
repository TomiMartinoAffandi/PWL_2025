<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showCategory($category)
    {
        return view('products', ['category' => $category]);
    }
}

