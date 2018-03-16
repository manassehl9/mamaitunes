<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Category;
use App\Item;

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
        $categories = Category::all();
        $items = Item::all();
        return view('welcome', compact('sliders', 'categories', 'items'));
    }
}
