<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Frontend extends Controller
{
    public function index()
    {
        $title = 'Admin Welcome';
        return view('front.app', ['title' => $title]);
    }
}
