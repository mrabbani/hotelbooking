@if(isset($item))
    {!! Form::model($item, ['url' => 'administration/users/' . $item->id, 'method' => 'put' ]) !!}
@else 
    {!! Form::open(['url' => 'administration/users' ]) !!}
@endif
   
    <div class="form-group">
        {!! Form::label('type', 'User Type', ['class' => 'control-label']) !!}
        {!! Form::select('type', [1 => 'General', 2 => 'Admin'], null, ['required class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ url('administration/users') }}" class="btn btn-danger">Cancel</a>
    </div>

{!! Form::close() !!}