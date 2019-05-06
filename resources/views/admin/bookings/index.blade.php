@extends('layouts.master', [
    'menu' => 'booking'
])

@section('content')

<div class="col-md-10 offset-md-1 d-print-none">
    @include('_success')

    <div class="card">
        <div class="card-header">
            <a href="{{ url('administration/bookings') }}">Booking List</a>
        </div>

        <div class="card-body">
            <table class="table table-hover dataTable">
                <thead>
                    <tr>
                        <th width="30px"> ID </th>
                        <th width="130px">Guest Name</th>
                        <th>Room</th>
                        <th width="130px">Hotel Name</th>
                        <th width="90px">Check In</th>
                        <th width="100px">Check Out</th>
                        <th width="80px">Payment</th>
                        <th width="80px">Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($itemList as $booking)
                        <tr>
                            <td>{{ $booking->invoice_id }}</td>
                            <td>{{ $booking->user->name ?? '' }}</td>
                            <td>{{ $booking->room->title }}</td>
                            <td>{{ $booking->room->hotel_name }}</td>
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
                                        <a href="#" class="dropdown-item print-invoice" data-targetId="bookingInvoice{{$booking->id}}"  class="btn btn-info btn-sm">
                                            Print Invoice
                                        </a>
                                        @if($booking->status != App\Booking::CANCELLED && $booking->check_out >= Carbon\Carbon::now())
                                            <a class=" dropdown-item" href="#" data-toggle="modal" data-target="#cancelModal{{$booking->id}}">
                                                Cancel
                                            </a>
                                        @endif

                                        @if($booking->status != App\Booking::CANCELLED && $booking->payment_status == App\Booking::UNPAID)
                                            <a class=" dropdown-item" href="#" data-toggle="modal" data-target="#paymentModal{{$booking->id}}">
                                                Mark as Paid
                                            </a>
                                        @endif 

                                        @if($booking->status == App\Booking::CANCELLED )
                                            <a class=" dropdown-item" href="#" data-toggle="modal" data-target="#refundModal{{$booking->id}}">
                                                Refund
                                            </a>
                                        @endif

                                        <a class="dropdown-item" href="{{url('rooms/' . $booking->room->id)}}" class="btn btn-info btn-sm">
                                            Room Details
                                        </a>
                                    </div>

                                <!-- Cancel Modal -->
                                <div class="modal fade" id="cancelModal{{$booking->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            Cancel booking for <strong>{{ $booking->user->name ?? '' }} </strong>?
                                            </div>
                                            <div class="modal-footer">
                                                {!! Form::open(['url' => 'administration/bookings/' . $booking->id . '/cancel']) !!}
                                                <button type="submit" class="btn btn-danger">Yes</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Cancel Modal -->    

                                <!-- Payment Modal -->
                                <div class="modal fade" id="paymentModal{{$booking->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                Mark booking as paid for <strong>{{ $booking->user->name ?? '' }} </strong>?
                                            </div>
                                            <div class="modal-footer">
                                                {!! Form::open(['url' => 'administration/bookings/' . $booking->id . '/mark-as-paid']) !!}
                                                <button type="submit" class="btn btn-danger">Yes</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Payment Modal -->    

                                <!-- Refund Modal -->
                                <div class="modal fade" id="refundModal{{$booking->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            Refund booking for <strong>{{ $booking->user->name ?? '' }} </strong>?
                                            </div>
                                            <div class="modal-footer">
                                                {!! Form::open(['url' => 'administration/bookings/' . $booking->id . '/refund']) !!}
                                                <button type="submit" class="btn btn-danger">Yes</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Refund Modal -->    
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">No data found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

    @foreach($itemList as $booking)
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