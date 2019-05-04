@extends('layouts.master')

@section('content')

<div class="col-md-10 offset-md-1">
    @include('_success')

    <div class="card">
        <div class="card-header">
            <a href="{{ url('administration/rooms') }}">Rooms</a>
            <span class="float-right">
                <a href="{{ url('administration/rooms/create') }}" class="btn btn-primary btn-sm">New Room</a>
            </span>
        </div>

        <div class="card-body">
            <table class="table table-hover dataTable">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Room Title</th>
                        <th>Hotel</th>
                        <th>Capacity</th>
                        <th>Status</th>
                        <th>Accommodation</th>
                        <th>Price/Nighth</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @php 
                        $counter = 1; //($itemList->currentPage()-1) * $itemList->perPage() + 1; 
                    @endphp
        
                    @foreach ($itemList as $item)
                        <tr>
                            <td>{{ $counter++ }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->hotel_name }}</td>
                            <td>
                                <abbr title="Adult Capacity">Ad:</abbr> {{ $item->adult_capacity }} &nbsp;
                                <abbr title="Child Capacity">Ch:</abbr> {{ $item->child_capacity }}
                            </td>
                            <td>{{ $item->is_active == 1 ? 'Active' : 'Inactive' }}</td>
                            <td>{{ $item->accommodation ?? '' }}</td>
                            <td class="text-right"> {{ number_format($item->price_per_night ?? 0, 2) }}</td>
                            <td>
                                <a href="{{ url('administration/rooms/' . $item->id . '/edit') }}">Edit</a>
                                <a href="{{ url('rooms/' . $item->id) }}">Details</a>
                            </td>
                        </tr>
                    @endforeach
        
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection