<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function load_home(){
        return view('pages.home');
    }
    public function load_about(){
        return view('pages.about');
    }
    public function load_dashboard(){
        return view('pages.dashboard');
    }
    
}
