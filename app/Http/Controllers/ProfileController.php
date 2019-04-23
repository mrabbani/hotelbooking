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

        return back();
    }

    public function myBookings(Request $request)
    {
        $bookingList = $request->user()->bookings()->latest()->paginate();

        return view('profile.my_bookings', compact('bookingList'));
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

        return redirect('profile');
    }
}
