<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use Carbon\Carbon;
use App\Http\Requests\BookingRequest;

class RoomsController extends Controller
{
    public function show($id)
    {
        $bookingInfo = null; 
        $bookingRequest = BookingRequest::capture();

        $query = Room::query();

        if ($bookingRequest->passes()) {
            $bookingInfo = $bookingRequest->all();
            $bookingInfo['nights'] = $bookingRequest->getNights();

            $query = $query->availableForRequest($bookingRequest);
        }

        $room = $query->findOrFail($id);
        
        return view('rooms.show', compact('room', 'bookingInfo'));
    }
}
