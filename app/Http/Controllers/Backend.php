<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Backend extends Controller
{
    public function common()
    {
        if (Auth::user()?->role == 'user') {
            return redirect()->route('frontend-welcome');
        } else {
            return redirect()->route('backend-index');
        }
    }
    public function index()
    {
        $title = 'Admin Welcome';
        return view('back.app', ['title' => $title]);
    }
}
