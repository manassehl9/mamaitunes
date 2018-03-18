<?php


namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('dashboard.reservation.index', compact('reservations'));
    }

    public function status($id)
    {
        $reservation = Reservation::find($id);
        $reservation->status = true;
        $reservation->save();
        
        Toastr::success('Reservation successfully confirmed', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }
}
