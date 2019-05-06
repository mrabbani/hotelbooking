@if(isset($item))
    {!! Form::model($item, ['url' => 'administration/countries/' . $item->id, 'method' => 'put' ]) !!}
@else 
    {!! Form::open(['url' => 'administration/countries' ]) !!}
@endif

    <div class="form-group">
        {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['required class' => 'form-control']) !!}
    </div>
   
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ url('administration/countries') }}" class="btn btn-danger">Cancel</a>
    </div>

{!! Form::close() !!}