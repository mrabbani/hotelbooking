<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Http\Requests\BookingRequest;
use App\Room;

class BookingController extends Controller
{
    public function store($roomId, BookingRequest $request)
    {
        $room = Room::availableForRequest($request)
        ->findOrFail($roomId);
        
        return $room->bookings()->create($this->getBookingData($request, $room->price_per_night));
    }

    private function getBookingData(BookingRequest $request, $pricePerNight) 
    {
        return [
            'user_id' => $request->user()->id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'price_per_night' => $pricePerNight,
            'properties' => $request->all(),
        ];
    }
}
