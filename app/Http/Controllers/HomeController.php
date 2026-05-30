<?php

namespace App\Http\Controllers;

use App\Models\CtaSection;
use App\Models\HeroSection;
use App\Models\HomeFeature;
use App\Models\HomeCourse;
use App\Models\HomeStep;
use App\Models\HomeTestimonial;


class HomeController extends Controller
{
    public function index()
    {
        // Hero Section
       
        return view('home');
    }
}