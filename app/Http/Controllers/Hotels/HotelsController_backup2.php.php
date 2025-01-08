<?php

namespace App\Http\Controllers\Hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment\Apartment;
use App\Models\Booking\Booking;
//use App\Models\Hotel\Hotel;
use Illuminate\Support\Facades\Auth;
//use Auth;
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
    }  // Fixed: Added missing closing bracket

    public function roomBooking(Request $request, $id) {
        $room = Apartment::find($id);
        $hotel = Apartment::find($id);

        if (date("Y/m/d") < $request->check_in && date("Y/m/d") < $request->check_out) {
            $datetime1 = new DateTime($request->check_in);
            $datetime2 = new DateTime($request->check_out);
            $interval = $datetime1->diff($datetime2);  // Get diff between dates
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

            echo "Room booked successfully.";

            if ($request->check_in < $request->check_out) {
                // Booking success logic here (if needed)
            } else {
                echo "Check-out date should be greater than check-in date.";
            }
        } else {
            echo "Invalid check-in or check-out date, Please choose future dates";
        }
    }
}
