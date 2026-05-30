<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HowItWorksController extends Controller
{
    // How It Works page
    public function index()
    {
       

        return view('how-it-works.index');
    }
}