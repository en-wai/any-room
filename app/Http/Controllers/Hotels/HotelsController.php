<?php

namespace App\Http\Controllers\Hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment\Apartment;
use App\Models\Booking\Booking;
use App\Models\Hotel\Hotel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HotelsController extends Controller
{
    public function rooms($id) {
        $getRooms = Apartment::select()->orderBy('id', 'desc')->take(6)
            ->where('hotel_id', $id)->get();

        return view('hotels.rooms', compact('getRooms'));
    }

    public function roomDetails($id) {
        $getRoom = Apartment::find($id);
        return view('hotels.roomdetails', compact('getRoom'));
    }

    public function roomBooking(Request $request, $id) {
        // Validate the incoming request data
        $request->validate([
            'check_in' => 'required|date|after:today', // Check-in must be a future date
            'check_out' => 'required|date|after:check_in', // Check-out must be after check-in
        ], [
            'check_in.after' => 'Please select a future check-in date.',
            'check_out.after' => 'Check-out date must be later than the check-in date.',
        ]);

        // Fetch room and hotel details
        $room = Apartment::find($id);
        $hotel = Hotel::find($room->hotel_id);

        // Calculate the number of days
        $checkIn = new \DateTime($request->check_in);
        $checkOut = new \DateTime($request->check_out);
        $interval = $checkIn->diff($checkOut);
        $days = (int) $interval->format('%a');

        // Calculate the total price
        $pricePerNight = (float) str_replace(['$', ','], '', $room->price);
        $totalPrice = $days * $pricePerNight;

        // Create a new booking
        $bookRooms = Booking::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            "check_in" => $request->check_in,
            "check_out" => $request->check_out,
            "days" => $days,
            "price" => $totalPrice, 
            "user_id" => Auth::user()->id,
            "room_name" => $room->name,
            "hotel_name" => $hotel ? $hotel->name : 'Hotel Not Found', // Handle null hotel
        ]);

        // Store price in session and redirect to payment form
        Session::put('price', $totalPrice);

        return view('hotels.redirect-to-pay')->with('price', $totalPrice);
    }

    public function payWithPaypal(Request $request) {
        if ($request->isMethod('post')) {
            // Process payment logic here
            return redirect()->route('hotel.success')->with('success', 'Payment successful!');
        }
        return view('hotels.pay');
    }

    public function success() {
        Session::forget('price');
        return view('hotels.success');
    }
}
