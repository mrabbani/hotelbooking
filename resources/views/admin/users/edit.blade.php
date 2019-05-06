@extends('layouts.master', ['menu' => 'admin'])

@section('content')

<div class="col-md-10 offset-md-1">
    @include('_success')

    <div class="card">
        <div class="card-header">
            <a href="{{ url('administration/users') }}">Edit user type of <strong> {{$item->name}} </strong></a>
        </div>
        <div class="card-body">
            @include('admin.users._form')
        </div>
    </div>
</div>

@endsection