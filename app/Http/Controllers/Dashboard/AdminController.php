<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Slider;
use App\Item;
use App\Contact;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $categoryCount = Category::count();
        $itemCount = Item::count();
        $sliderCount = Slider::count();
        $contactCount = Contact::count();
        $reservations = Reservation::where('status',false)->get();
        return view('dashboard.admin', compact('categoryCount', 'itemCount', 'reservations', 'contactCount', 'sliderCount'));
    }
}
