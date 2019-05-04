@extends('layouts.master')

@section('content')

<div class="col-md-10 offset-md-1">
    @include('_success')

    <div class="card">
        <div class="card-header">
            <a href="{{ url('administration/rooms') }}">Edit Rooms</a>
        </div>
        <div class="card-body">
            @include('admin.rooms._form')
        </div>
    </div>
</div>

@endsection