<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return 'Selamat Datang';
    }
    public function about(){
        return 'Halo, nama saya Tomi Martino Affandi. NIM saya 2341720245';
    }
    public function articles($id){
        return "Halaman Artikel dengan Id: $id";
    }
    
}
