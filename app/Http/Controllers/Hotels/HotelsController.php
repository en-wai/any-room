<?php

namespace App\Http\Controllers\Hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment\Apartment;
use App\Models\Booking\Booking;
use App\Models\Hotel\Hotel;
use Illuminate\Support\Facades\Auth;
use DateTime;

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
        $hotel = Apartment::find($id);

        // Convert dates to DateTime objects for proper comparison
        $today = new DateTime();
        $checkIn = new DateTime($request->check_in);
        $checkOut = new DateTime($request->check_out);

        if ($today < $checkIn && $today < $checkOut) {
            if ($checkIn < $checkOut) {
                $interval = $checkIn->diff($checkOut);  // Get difference between check-in and check-out
                $days = $interval->format('%a');

                // Logic for booking rooms
                $bookRooms = Booking::create([
                    "name" => $request->name,
                    "email" => $request->email,
                    "phone_number" => $request->phone_number,
                    "check_in" => $request->check_in,
                    "check_out" => $request->check_out,
                    "days" => $days,
                    "price" => 0,
                    "user_id" => Auth::user()->id,
                    "room_name" => $room->name,
                    "hotel_name" => $hotel->name,
                ]);

                echo "Your room has been successfully booked. We look forward to your stay!";
            } else {
                echo "The check-out date must be later than the check-in date. Please adjust your selection.";
            }
        } else {
            echo "Please select future dates for both check-in and check-out. Past dates cannot be booked.";
        }
    }
}
