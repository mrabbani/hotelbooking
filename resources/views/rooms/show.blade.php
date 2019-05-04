@extends('layouts.master', ['pageTitle' => $room->hotel_name . ' | '  . $room->title])

@section('styles')
<style>
        #room-banner .carousel-item> img {
            height: 250px;
        }
    </style>
@endsection
@section('content')
    <div class="room-banner">
        @include('rooms._banner')
    </div>
    <div class="booking-details">
        <div class="row p-3 bg-white">
            <div class="col-md-7 offset-md-1 mr-4 pr-4 pl-0">
                <div class="card border-0" id="room-details">
                    <div class="card-body p-0 pr-3">
                        <h2 class="card-title">{{ $room->hotel_name }}</h2>
                        <h5 class="card-subtitle mb-2 text-muted">{{$room->title ?? 'Address'}}</h5>
                        <div class="card-text mt-3 pl-3">
                            <div class="media opc-80 ">
                                <div class="mr-2">
                                    <span class="font-90"><i class="fa fa-home"></i></span>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-0 ">About Apparments</h5>
                                    <span class="opc-75"> {{ $room->apartment_description }}</span>
                                </div>
                            </div>
                            <div class="media opc-80 mt-2">
                                <div class="mr-2">
                                    <span class="font-90" ><i class="fa fa-map-marker-alt"></i></span>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-0">Address</h5>
                                    <span class="opc-75"> {{$room->address }}</span>
                                </div>
                            </div>
                            <div class="media opc-80 mt-2">
                                <div class="mr-2">
                                    <span class="font-90" ><i class="fa fa-door-open"></i></span>
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-0">Check In</h5>
                                    <span class="opc-75"> {{$room->check_in_process }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-text mt-3 border-top pt-3">
                                {{$room->description }}
                        </div>
                            @if (count($amenities = $room->amenities ?? []))
                                <div class="card-text mt-3  pt-3">
                                    <h4 class="border-bottom"> Amenities</h4>
                                    @foreach($amenities as $key => $amItmes)
                                        <div class="media mt-3">
                                            <div class="mr-4 w-25 pl-3 " >
                                                <h6 class="opc-85"> {{ucwords($key)}}</h5>
                                            </div>
                                            <div class="media-body">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        @foreach($amItmes as $value)
                                                        <tr>
                                                            <td class="pt-0"> 
                                                                <span class="text-muted font-85 mr-2"><i class="fa fa-align-right"> </i></span> 
                                                                    {{$value}}
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endforeach 
                                </div>
                            @endif
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="booking-info sticky-top">
                    <div class="card " >
                        <div class="card-body">
                            <h5 class="card-title">
                                <span  class="text-monospace">BDT {{ $room->price_per_night }}</span>
                            <sub class="text-muted">per nigth</sub> </h5>
                            
                            @if($bookingInfo ?? null)
                                <div class="card-subtitle mb-2 text-muted">
                                    {{Carbon\Carbon::parse($bookingInfo['check_in'] )->format('M d')}} -
                                    {{Carbon\Carbon::parse($bookingInfo['check_out'])->format('M d')}}
                                </div>
                            @endif

                            @if($bookingInfo ?? null)
                                <div class="card-text border-top pt-2">
                                    <ul class="list-group list-group-flush">
                                    <li class="list-group-item p-2">Audult <span class="float-right"> {{ $bookingInfo['adult'] ?? 0 }}</span></li>
                                        <li class="list-group-item p-2">Child <span class="float-right"> {{ $bookingInfo['child'] ?? 0 }}</span></li>
                                        <li class="list-group-item p-2">No of Nights <span class="float-right"> {{ $bookingInfo['nights'] ?? 0}}</span></li>
                                        <li class="list-group-item p-2">Total Charge <strong class="float-right"> {{ $room->getTotalCharge($bookingInfo['nights']) ?? 0}}</strong></li>
                                    </ul>
                                </div>
                                <div class="card-text pt-2">
                                    <button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#bookingModal">
                                        Confirm Booking
                                    </button>
                                </div>
                            @else 
                                <div class="card-text border-top pt-2">
                                    <ul class="list-group list-group-flush">
                                    <li class="list-group-item p-2">Audult Capacity <span class="float-right"> {{ $room->adult_capacity ?? 0 }}</span></li>
                                        <li class="list-group-item p-2">Child Capacity <span class="float-right"> {{ $room->child_capacity ?? 0 }}</span></li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card mt-4 opc-80" >
                        <div class="card-body">
                            <h6 class="card-title text-muted"> Contact Details</h6>
                            <div class="card-text border-top pt-2">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item p-2 border-0"> <span class="mr-2"><i class="fa fa-user"> </i></span> <strong>{{ $room->contact_person ?? 'Undefined'}}</strong> </li>
                                    <li class="list-group-item p-2 border-0 "> <span class="mr-2"><i class="fa fa-envelope"> </i></span> {{ $room->contact_email ?? 'Undefined'}}  </li>
                                    <li class="list-group-item p-2 border-0 "> <span class="mr-2"><i class="fa fa-phone-square"> </i></span> {{ $room->contact_number ?? 'Undefined'}}  </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
        <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="bookingModalLabel">Booking Confirmation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Do you want to book this room?
            </div>
            <div class="modal-footer">
                <a href="{{ url('rooms/' . $room->id . '/confirm-booking?'). http_build_query($bookingInfo ?? [])}}" 
                    class="btn btn-primary">Confirm </a>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>

    <div class="modal fade room-images" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div> Room Images</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @include('rooms._images')
            </div>
        </div>
    </div>
@endsection