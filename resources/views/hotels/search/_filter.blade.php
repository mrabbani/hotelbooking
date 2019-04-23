{{ Form::open(['url' => 'hotels/search', 'method' => 'get']) }}
    <div class="form-group">
        {!! Form::label('city', 'City', [ 'class' => 'col-form-label']) !!}
        {!! Form::text('city', request('city') ?: null, [' required class' => 'form-control', 'list' => 'cityList']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category', 'Category') !!}
        {!! Form::Select('category', ['0' => 'Any', '1' => 'Hotel', '2' => 'Home'], request('category') ?: null, [' required class' => 'form-control']) !!}
    </div>
    <div class="row">
        <div class="col-md-6">
                <div class="form-group">
                {!! Form::label('adult', 'Adult') !!}
                {!! Form::number('adult', request('adult') ?: null, ['min' =>1 ,'max' => '20', ' required class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('child', 'Child') !!}
                {!! Form::number('child', request('child') ?: null, ['min' =>0, 'max' => '20', 'class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('check_in', 'Check In') !!}
        {!! Form::date('check_in', request('check_in') ?: null, [' required class' => 'form-control date-picker']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('check_out', 'Check Out') !!}
        {!! Form::date('check_out', request('check_out') ?: null, [' required class' => 'form-control date-picker']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Search', [' required class' => 'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}


@include('cities._list')