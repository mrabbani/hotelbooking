@extends('layouts.master', ['pageTitle' => 'My Bookings'])

@section('content')
    <div class="row d-print-none">
        <div class="col-md-3">
            <div class="ml-2">
                @include('profile._nav', ['menu' => 'booking'])
            </div>
        </div>
        <div class="col-md-8">
           
            @include('_success')

            <div class="card">
                <div class="card-header">
                    <div class="container">
                        <div class="row">
                            <div class="col order-first">
                                <a href="{{url('profile/my-bookings')}}">Booking list</a>
                            </div>
                            <div class="col order-last text-right">
                                <form class="form-inline float-right" action="{{url('profile/my-bookings')}}">
                                <input name="booking_id" class="form-control form-control-sm" type="text" placeholder="Search by Booking ID" value="{{ request('booking_id') }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="p-3 ml-2 bg-white">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="30px"> ID </th>
                                    <th width="130px">Hotel Name</th>
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
                                        <td>{{ $booking->invoice_id }}</td>
                                        <td>{{ $booking->room->hotel_name }}</td>
                                        <td>{{ $booking->room->address }}</td>
                                        <td>{{ $booking->check_in->format('d M y') }}</td>
                                        <td>{{ $booking->check_out->format('d M y') }}</td>
                                        <td>{{ $booking->payment_label }}</td>
                                        <td>{{ $booking->status_label }}</td>
                                        <td>
                                            <div class=" dropdown">
                                                <a class=" dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-cog"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    @if($booking->payment_status == App\Booking::UNPAID && $booking->payment_status != App\Booking::CANCELLED)
                                                    <span class="dropdown-item">
                                                        @include('payment.stripe')
                                                    </span>
                                                    @endif
                                                    <a href="#" class="dropdown-item print-invoice" data-targetId="bookingInvoice{{$booking->id}}"  class="btn btn-info btn-sm">
                                                        Print Invoice
                                                    </a>
                                                    <a class="dropdown-item" href="{{url('rooms/' . $booking->room->id)}}" class="btn btn-info btn-sm">
                                                        Room Details
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">No data found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="8">
                                        {{ $bookingList->links() }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($bookingList as $booking)
        @include('profile._booking_invoice')
    @endforeach
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('.print-invoice').click(function(e) {
            e.preventDefault();
            var selectorId = $(this).attr('data-targetId');
            $('.booking-invoice').removeClass('d-print-block');
            $('.booking-invoice').addClass('d-print-none');

            $('#' + selectorId).removeClass('d-print-none')
            $('#' + selectorId).addClass('d-print-block')

            window.print();
        })
    })
</script>
@endsection