@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- <div class="card-header text-uppercase text-dark">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        {{ __('lang.trainers') }} 
                        
                    </div> 
                    <div class="col-sm-12 col-md-6">
  
                        <a class="btn btn-success float-left " data-toggle="modal" data-target="#create">{{ __('lang.create') }}</a>

                    </div>
            

            </div> -->
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="card-header">
                            <h3 class="hidden-xs">{{ __('lang.trainers') }}</h3>
                        </div>  
                    </div>
                    
                </div>
            
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                    @include('pagination.paginate', ['controller' => "trainers",'search' => $data['search'],'rows' => $data['rows']])
                    </div>
                    <div class="col-sm-12 col-md-6">
                    @include('pagination.search', ['controller' => "trainers",'search' => $data['search']])
                    </div>
                    <div class="table-responsive text-light">
                    
                        <div class="col-sm-12">
                            <table data-order='[[ 0, "desc" ]]' class="table">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <!-- <th scope="col">{{ __('lang.terms_and_conditions') }} {{ __('lang.en') }}</th> -->
                                    <th scope="col">{{ __('lang.client_name') }}</th>
                                    <th scope="col">{{ __('lang.phone_number') }}</th>
                                    <th scope="col">{{ __('lang.email_address') }}</th>
                                    <th scope="col">{{ __('lang.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['trainers'] as $index => $trainer)
                                    <tr>
                                        <td>{{ $trainer->id }}</td>
                                        <td>{{ $trainer->name}}</td>
                                        <td>{{ $trainer->phone}}</td>
                                        <td>{{ $trainer->email}}</td>
                                        <td>
                                            <form class="wbd-form" action="{{ route('admins.trainers.destroy', $trainer->id) }}" method="POST" enctype="multipart/form-data" >
                                                @csrf
                                                @method("DELETE")

                                                <a class="btn btn-success" href="{{ route('admins.trainers.show', $trainer->id) }}">{{ __('lang.view') }}</a>
                                                <a class="btn btn-warning" href="" data-toggle="modal" data-target="#edit-{{$trainer->id}}">{{ __('lang.edit') }}</a>
                                                <button type="submit" class="btn btn-danger"> {{ __('lang.delete') }} </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-2">
            </div>
            <div class="col-sm-12 col-md-8 ">
                <div class="p-auto">
                    {{ $data['trainers']->withQueryString()->onEachSide(1)->links('pagination.links') }}
                </div>
                
            </div>
            <div class="col-sm-12 col-md-2 ">

            </div>
        </div>
    </div>
</div>

@foreach($data['trainers']  as $index => $trainer)
    <div class="modal fade" id="edit-{{$trainer->id}}" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-md">
        <div class="modal-content ">
            <form action="{{ route('admins.trainers.update', $trainer->id ) }}" method="POST">
            {{ method_field('PUT') }}
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="modal-header bg-dark">
            <h5 class="modal-title text-white">{{ __('lang.update') }}</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label >{{ __('lang.name') }}</label>
                    <input type="text" class="form-control" name="name" value="{{$trainer->name}}">
                </div>
                <div class="form-group">
                    <label >{{ __('lang.phone') }}</label>
                    <input type="text" class="form-control" name="phone" maxlength="10" value="{{$trainer->phone}}" >
                </div>
                <div class="form-group">
                    <label >{{ __('lang.email') }}</label>
                    <input type="text" class="form-control" name="email" value="{{$trainer->email}}">
                </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-inverse-dark" data-dismiss="modal"><i class="fa fa-times"></i> {{ __('lang.close') }}</button>
            <button type="submit" class="btn btn-dark"><i class="fa fa-check-square-o"></i> {{ __('lang.save') }} </button>
            </div>
            </form>
        </div>
        </div>
    </div>
@endforeach


@endsection




@push('footer')

@endpush