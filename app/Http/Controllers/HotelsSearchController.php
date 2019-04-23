<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use Carbon\Carbon;
use App\Http\Requests\BookingRequest;

class HotelsSearchController extends Controller
{
    public function index(Request $request)
    {
        $bookingInfo = $request->all();
        $bookingInfo['nights'] = 1;
        $query = Room::query();
        
        $bookingRequest = BookingRequest::capture();

        if ($bookingRequest->passes()) {
            $query = $query->availableForRequest($bookingRequest);
            
            $bookingInfo['nights'] = $bookingRequest->getNights();
        }
        
        $roomList = $query->paginate()->appends($request->except('page'));

        return view('hotels.search.index', compact('roomList',  'bookingInfo'));
    }

    private function getNights($checkIn, $checkOut) 
    {
        $count  = Carbon::parse($checkIn)->diffInDays(Carbon::parse($checkOut));

        return $count ?: 1;
    }
}
