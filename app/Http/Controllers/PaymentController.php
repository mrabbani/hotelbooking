<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;

class PaymentController extends Controller
{
    public function store($bookingId,  Request $request)
    {
        $booking = Booking::find($bookingId);
        $props = $booking->properties;

        $props['payment'] = [
            'token' =>  $request->stripeToken, 
            'card' => $request->stripeTokenType,
            'email' => $request->stripeEmail,
        ];

        $booking->update([
            'status' => Booking::BOOKED, 
            'payment_status' => Booking::PAID,
            'properties' => $props
        ]);

        return redirect('profile/my-bookings')->with('msg', 'Your payment is successfully completed');
    }
    
}
