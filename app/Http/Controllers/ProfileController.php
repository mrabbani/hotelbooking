<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        return view('profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'mobile' => 'required']);

        $request->user()->update($request->only('name', 'mobile'));

        return back()->with('msg', 'Account information is updated successfully');
    }

    public function myBookings(Request $request)
    {
        $bookingQuery = $request->user()->bookings();
        
        if ($request->booking_id) {
            $bookingQuery = $bookingQuery->where('id', (int) $request->booking_id);
        }

        $bookingList = $bookingQuery->latest()->paginate();
        $user = $request->user();

        return view('profile.my_bookings', compact('bookingList', 'user'));
    }

    public function changePassword(Request $request)
    {
        $user = $request->user();

        return view('profile.change_password', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, ['password' => ['required', 'string', 'min:6', 'confirmed']]);

        $request->user()->update(['password' => Hash::make($request->password)]);

        return redirect('profile')->with('msg', 'Password is updated successfully');
    }

    public function pay(Request $request)
    {
        $user = $request->user();
        
        return view('payment.stripe');
    }
}
