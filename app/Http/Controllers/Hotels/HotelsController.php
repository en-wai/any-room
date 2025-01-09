<?php

namespace App\Http\Controllers\Hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment\Apartment;
use App\Models\Booking\Booking;
use App\Models\Hotel\Hotel;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

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
        $room = Apartment::find($id);
        $hotel = Hotel::find($room->hotel_id);  // Fetch hotel by hotel_id from the room

        // Convert dates to DateTime objects for proper comparison
        $today = new DateTime();
        $checkIn = new DateTime($request->check_in);
        $checkOut = new DateTime($request->check_out);

        if ($today < $checkIn && $today < $checkOut) {
            if ($checkIn < $checkOut) {
                $interval = $checkIn->diff($checkOut);  // Get difference between check-in and check-out
                $days = (int) $interval->format('%a');  // Convert days to integer

                // Convert room price to a float for calculation
                $pricePerNight = (float) str_replace(['$', ','], '', $room->price);  
                $totalPrice = $days * $pricePerNight;  // Calculate total price

                // Logic for booking rooms
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
                    "hotel_name" => $hotel ? $hotel->name : 'Hotel Not Found',  // Handle null hotel
                ]);

                // Store price in session and redirect to payment form
                Session::put('price', $totalPrice);

                return view('hotels.redirect-to-pay')->with('price', $totalPrice);

            } else {
                echo "The check-out date must be later than the check-in date. Please adjust your selection.";
            }
        } else {
            echo "Please select future dates for both check-in and check-out. Past dates cannot be booked.";
        }
    }

    public function payWithPaypal(Request $request) {
        if ($request->isMethod('post')) {
            // Process payment logic here
            return redirect()->route('hotel.success')->with('success', 'Payment successful!');
        }
        return view('hotels.pay');
    }

    public function success() {
        return view('hotels.success');
    }
}
