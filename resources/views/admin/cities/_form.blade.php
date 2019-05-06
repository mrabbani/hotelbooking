@if(isset($item))
    {!! Form::model($item, ['url' => 'administration/cities/' . $item->id, 'method' => 'put' ]) !!}
@else 
    {!! Form::open(['url' => 'administration/cities' ]) !!}
@endif

    <div class="form-group">
        {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['required class' => 'form-control']) !!}
    </div>
   
    <div class="form-group">
        {!! Form::label('country_id', 'Country', ['class' => 'control-label']) !!}
        {!! Form::select('country_id', $countryList ?? [], null, ['required class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ url('administration/cities') }}" class="btn btn-danger">Cancel</a>
    </div>

{!! Form::close() !!}