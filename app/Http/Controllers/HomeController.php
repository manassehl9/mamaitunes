<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('welcome', compact('sliders'));
    }
}
