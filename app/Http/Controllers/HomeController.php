<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Models\Hotel\Hotel; // Imports the Hotel model
use App\Models\Apartment\Apartment; // Imports the Hotel model
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $hotels = Hotel::select()->orderBy('id','desc')->take(3)->get(); //This line fetches the latest 3 hotels from the Hotel model by ordering records in descending order of their id.
        
        $rooms = Apartment::select()->orderBy('id','desc')->take(4)->get();

        return view('home', compact('hotels', 'rooms'));
    }
}
