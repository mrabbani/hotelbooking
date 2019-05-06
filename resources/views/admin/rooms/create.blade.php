@extends('layouts.master', ['menu' => 'admin'])

@section('content')

<div class="col-md-10 offset-md-1">
    <div class="card">
        <div class="card-header">
            <a href="{{ url('administration/hotels') }}">Add New Room</a>
            
        </div>
        <div class="card-body">
            @include('admin.rooms._form')
        </div>
    </div>
</div>

@endsection