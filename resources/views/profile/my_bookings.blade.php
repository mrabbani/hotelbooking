@extends('layouts.master', ['pageTitle' => 'My Bookings'])

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="ml-2">
                @include('profile._nav', ['menu' => 'booking'])
            </div>
        </div>
        <div class="col-md-8">
            <div class="p-3 ml-2 bg-white">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="130px">Name</th>
                            <th>Address</th>
                            <th width="90px">Check In</th>
                            <th width="100px">Check Out</th>
                            <th width="80px">Payment</th>
                            <th width="80px">Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookingList as $booking)
                            <tr>
                                <td>{{ $booking->room->hotel_name }}</td>
                                <td>{{ $booking->room->address }}</td>
                                <td>{{ $booking->check_in->format('d M y') }}</td>
                                <td>{{ $booking->check_out->format('d M y') }}</td>
                                <td>{{ $booking->payment_label }}</td>
                                <td>{{ $booking->status_label }}</td>
                                <td>
                                    <a href="{{url('rooms/' . $booking->room->id)}}" class="btn btn-info btn-sm">
                                        Room Details
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">No data found</td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                {{ $bookingList->links() }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection