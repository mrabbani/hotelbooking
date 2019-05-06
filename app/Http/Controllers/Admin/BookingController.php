<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hotel;
use App\City;
use App\Room;
use App\Booking;

class BookingController extends CrudController
{
    protected function getModel(): \Illuminate\Database\Eloquent\Model
    {
        return new Booking();
    }

    protected function getViewPath(): string
    {
        return 'admin.bookings';
    }

    protected function getData(): array
    {

        return [];
    }

    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update(['status' => Booking::CANCELLED]);

        return back()->with('msg', 'Booking is cancelled successfully');
    }

    public function markAsPaid($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update(['payment_status' => Booking::PAID, 'status' => Booking::BOOKED]);

        return back()->with('msg', 'Booking is marked as paid successfully');
    }

    public function refund($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update(['payment_status' => Booking::REFUNDED]);

        return back()->with('msg', 'Booking is refunded successfully');
    }
}
