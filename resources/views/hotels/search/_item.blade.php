<div class="card mb-3" >
    <div class="row no-gutters">
        <div class="col-md-4" >
                {{-- <img src="{{ asset('img/upload/room.jpg') }}" class="card-img" alt="..."> --}}
            <div class="card-img h-100 ">
                @include('hotels.search._images')
            </div>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <a target="_bluk" href="{{ url('rooms/' . $room->id . '?'. http_build_query($bookingInfo ?? []))}}">
                    <h5 class="card-title">
                        <small class="text-muted">{{ $room->title}}</small><br/>
                        {{ $room->hotel_name }}
                    </h5>
                </a>
                
                <div class="card-text pr-2 opc-85 ">
                        {{ $room->apartment_description }}
                </div>
            
                <div class="pt-3 pr-2 text-right text-muted">
                        <span class="font-weight-bold">BDT {{$room->price_per_night}}/night</span><br>
                        <small data-container="body">Total: BDT {{ $room->getTotalCharge($bookingInfo['nights'] )}}</small>
                </div>
            </div>
        </div>
    </div>
</div>