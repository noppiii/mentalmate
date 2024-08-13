<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesKesehatanMentalController extends Controller
{
    public function index()
    {
        return view('pages.mahasiswa.test-mental.index');
    }
}