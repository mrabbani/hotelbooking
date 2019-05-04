@if(isset($item))
    {!! Form::model($item, ['url' => 'administration/hotels/' . $item->id, 'method' => 'put' ]) !!}
@else 
    {!! Form::open(['url' => 'administration/hotels' ]) !!}
@endif

    <div class="form-group">
        {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['required class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('type', 'Category') !!}
        {!! Form::Select('type', ['1' => 'Hotel', '2' => 'Home'], request('type') ?: null, [' required class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('city_id', 'City', ['class' => 'control-label']) !!}
        {!! Form::select('city_id', $cityList ?? [], null, ['required class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}
        {!! Form::textarea('address', null, ['required class' => 'form-control', 'rows' => 3]) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ url('administration/hotels') }}" class="btn btn-danger">Cancel</a>
    </div>

{!! Form::close() !!}