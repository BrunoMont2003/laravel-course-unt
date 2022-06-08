<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function laravel()
    {
        return view('laravel');
    }
    public function java()
    {
        return view('java');
    }
    public function django()
    {
        return view('django');
    }
}