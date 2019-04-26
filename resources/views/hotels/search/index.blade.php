@extends('layouts.master', ['pageTitle' => 'Search Result'])

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="p-3 ml-2 bg-white">
                <div class="text-muted text-right">Total {{ str_plural($bookingInfo['nights'] . ' night', $bookingInfo['nights'])}} </div>
                @include('hotels.search._filter')
            </div>
        </div>
        <div class="col-md-8">
            <div class="p-3 ml-2 bg-white">
                @forelse($roomList as $room)
                    @include('hotels.search._item')
                @empty 
                    @include('hotels.search._unavailable')
                @endforelse
                {{ $roomList->links() }}
            </div>
        </div>
    </div>
@endsection