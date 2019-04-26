
<div class="container d-print-block d-none booking-invoice" id="bookingInvoice{{$booking->id}}">
    <div class="row">
        <div class="col-sm">
            <h1> {{ $booking->room->hotel_name }}</h1>
            <div>{{ $booking->room->title }}</div>
            <address>
                {{ $booking->room->address }}
            </address>
        </div>
        <div class="col-sm text-right">
            <h3> Booking Invoice </h3>
            <div>Booking ID: <strong>{{ $booking->invoice_id }}</strong></div>
            <div>Phone: {{ $booking->room->contact_number }}</div>
            <div>E-mail: {{ $booking->room->contact_email }}</div>
        </div>
    </div>
    <div class="border-top mt-4 ">
        <div class="row pt-4">
            <div class="col-sm">
                <div class="card">
                    <div class="card-header">
                        <h3>Booking Details</h3>
                    </div>
                    <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th class="border-top-0  pt-0 px-2 pb-2">Accomodation</th>
                                    <td class="border-top-0  pt-0 px-2 pb-2">{{ $booking->room->accommodation }}</td>
                                </tr>
                                <tr>
                                    <th class="p-2">Check In</th>
                                    <td class="p-2">{{ $booking->check_in->format('d F Y') }}</td>
                                </tr>
                                <tr>
                                    <th class="p-2">Check Out</th>
                                    <td class="p-2">{{ $booking->check_out->format('d F Y') }}</td>
                                </tr>
                                <tr>
                                    <th class="p-2">Adult</th>
                                    <td class="p-2">{{ $booking->properties['adult'] ?? '' }}</td>
                                </tr>
                                @if ($child = $booking->properties['child']?? 0)
                                    <tr>
                                        <th class="p-2">Child</th>
                                        <td class="p-2">{{ $booking->properties['child'] ?? '0' }}</td>
                                    </tr>
                                @endif
                                <tr>
                                        <th class="p-2">Booking Status</th>
                                        <td class="p-2">{{ $booking->status_label }}</td>
                                    </tr>
                                <tr>
                                    <th class="p-2">Booked at</th>
                                    <td class="p-2">{{ $booking->created_at->format('d F Y h:i a') }}</td>
                                </tr>
                            </table>
                            <h4 class="guest-title"><span> Guest Information</span></h4>
                            <table class="table">
                                <tr>
                                    <th class="border-top-0  ">{{ $booking->user->name}}</th>
                                    <td class="border-top-0 ">
                                        <div>Phone: {{ $booking->user->mobile }} </div>
                                        <p>E-mail: {{ $booking->user->email }} </p>
                                    </td>
                                </tr>
                            </table>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card ml-4">
                    <div class="card-header">
                        <h3>Invoice Details</h3>
                    </div>
                    <div class="card-body text-right ">
                        <table class="table">
                            <tr>
                                <td class="border-top-0  pt-0 px-2 pb-2">Total Nights</th>
                                <td class="border-top-0  pt-0 px-2 pb-2 ">{{ $booking->getNights() }}</td>
                            </tr>
                            <tr>
                                <td class="border-top-0 p-2">Price per Night</td>
                                <td class="border-top-0 p-2 text-right"> BDT {{ number_format($booking->price_per_night, 2) }}</td>
                            </tr>
                            <tr>
                                <th class="p-2">Total</th>
                                <th class="p-2"> BDT {{ number_format($booking->total_charge, 2) }} </th>
                            </tr>
                        </table>
                        <h4 class="guest-title"><span> Payment Information</span></h4>
                            <table class="table">
                                <tr>
                                    <th class="border-top-0">Status</th>
                                    <td class="border-top-0 ">{{ $booking->payment_label }}</td>
                                </tr>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>