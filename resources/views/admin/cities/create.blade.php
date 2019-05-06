@extends('layouts.master', ['menu' => 'admin'])


@section('content')

<div class="col-md-10 offset-md-1">
    @include('_success')
    <div class="card">
        <div class="card-header">
            <a href="{{ url('administration/cities') }}">Add New City</a>
            
        </div>
        <div class="card-body">
            @include('admin.cities._form')
        </div>
    </div>
</div>

@endsection