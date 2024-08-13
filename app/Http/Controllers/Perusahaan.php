<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Perusahaan extends Controller
{
    public function index() 
    {
        return view('Perusahaan');
    }

    public function dataloker1()
    {
        return view('dataloker1');
    }

    public function tambahloker1()
    {
        return view('tambahloker1');
    }

    public function datalamaran1()
    {
        return view('datalamaran1');
    }
}
