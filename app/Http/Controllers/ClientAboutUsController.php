<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientAboutUsController extends Controller
{
    public function index()
    {
        return view('pages.client.about.index');
    }
}