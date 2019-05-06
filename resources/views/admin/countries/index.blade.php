@extends('layouts.master', ['menu' => 'admin'])

@section('content')

<div class="col-md-10 offset-md-1">
    @include('_success')

    <div class="card">
        <div class="card-header">
            <a href="{{ url('administration/countries') }}">Country List</a>
            <span class="float-right">
                <a href="{{ url('administration/countries/create') }}" class="btn btn-primary btn-sm">New Country</a>
            </span>
        </div>

        <div class="card-body">
            <table class="table table-hover dataTable">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @php 
                        $counter = 1; //($itemList->currentPage()-1) * $itemList->perPage() + 1; 
                    @endphp
        
                    @foreach ($itemList as $item)
                        <tr>
                            <td>{{ $counter++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->country->name ?? '' }}</td>
                            <td>
                                <a href="{{ url('administration/countries/' . $item->id . '/edit') }}">Edit</a>

                                <a class="text-danger" href="#" data-toggle="modal" data-target="#deleteModal{{$item->id}}">
                                    Delete
                                </a>
      
                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            Delete <strong>{{ $item->name }} </strong>?
                                            </div>
                                            <div class="modal-footer">
                                                {!! Form::open(['url' => 'administration/countries/' . $item->id, 'method' => 'delete']) !!}
                                                <button type="submit" class="btn btn-danger">Yes</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Delete Modal -->
                            </td>
                        </tr>
                    @endforeach
        
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection