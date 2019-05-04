@if(isset($item))
    {!! Form::model($item, ['url' => 'administration/rooms/' . $item->id, 'method' => 'put' ]) !!}
@else 
    {!! Form::open(['url' => 'administration/rooms' ]) !!}
@endif
<div class="row">
        
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('title', 'Room Title', ['class' => 'control-label']) !!}
            {!! Form::text('title', null, ['required class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('hotel_id', 'Hotel', ['class' => 'control-label']) !!}
            {!! Form::select('hotel_id', $hotelList ?? [], null, ['required class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('is_active', 'Active Status', ['class' => 'control-label']) !!}
            {!! Form::select('is_active', ['1' => 'Active', '0' => 'Inactive'], null, ['required class' => 'form-control', 'min' => 0, 'max'=> 20]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('adult_capacity', 'Adult Capacity', ['class' => 'control-label']) !!}
            {!! Form::number('adult_capacity', null, ['required class' => 'form-control', 'min' => 1, 'max' => 20]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('child_capacity', 'Child Capacity', ['class' => 'control-label']) !!}
            {!! Form::number('child_capacity', null, ['required class' => 'form-control', 'min' => 0, 'max'=> 20]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('apartment_description', 'Accommodation', ['class' => 'control-label']) !!}
            {!! Form::text('apartment_description', null, ['required class' => 'form-control', 'min' => 0, 'max'=> 20]) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('check_in_process', 'Check In Process', ['class' => 'control-label']) !!}
            {!! Form::text('check_in_process', null, ['required class' => 'form-control', 'min' => 0, 'max'=> 20]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('price_per_night', 'Price per Night', ['class' => 'control-label']) !!}
            {!! Form::text('price_per_night', null, ['required class' => 'form-control', 'min' => 0, 'max'=> 20]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('contact_person', 'Contact Person', ['class' => 'control-label']) !!}
            {!! Form::text('contact_person', null, ['required class' => 'form-control', 'min' => 0, 'max'=> 20]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('contact_number', 'Contact Number', ['class' => 'control-label']) !!}
            {!! Form::text('contact_number', null, ['required class' => 'form-control', 'min' => 0, 'max'=> 20]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('contact_email', 'Contact Email', ['class' => 'control-label']) !!}
            {!! Form::text('contact_email', null, ['required class' => 'form-control', 'min' => 0, 'max'=> 20]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', null, ['required class' => 'form-control', 'rows' => 3]) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url('administration/rooms') }}" class="btn btn-danger">Cancel</a>
        </div>
    </div>
    
    <div class="col-md-6">
        <h4> Amenities</h4>
        @foreach(config('room.amenities') as $key => $amItmes)
            <div class="media mt-3">
                <div class="mr-4 w-25 pl-3 " >
                    <h6 class="opc-85"> {{ucwords($key)}}</h5>
                </div>
                <div class="media-body">
                    <table class="table table-borderless">
                        <tbody>
                            @php $itemAmenities = ($item ?? $item->other_info['Amenities'] ?? []); @endphp

                            @foreach($amItmes as $key1 => $value)
                            <tr>
                                <td class="pt-0"> 
                                    <div class="form-check">
                                        {{ Form::checkbox('other_info[Amenities][' . $key. ']['. $key1 . ']', $value, in_array($value, $itemAmenities[$key] ?? []) ?: null, ['class' => 'form-check-input'] )}}
                                        <label class="form-check-label" for="defaultCheck1">
                                                {{$value}}
                                        </label>
                                    </div>
                                        
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
</div>
{!! Form::close() !!}