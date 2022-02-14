@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- <div class="card-header text-uppercase text-dark">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        {{ __('lang.positions') }} 
                        
                    </div> 
                    <div class="col-sm-12 col-md-6">
  
                        <a class="btn btn-success float-left " data-toggle="modal" data-target="#create">{{ __('lang.create') }}</a>

                    </div>
            

            </div> -->
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-9">
                        <div class="card-header">
                            <h3 class="hidden-xs">{{ __('lang.positions') }}</h3>
                        </div>  
                    </div>
                    <div class="col-3">
                        <button class="btn btn-success float-left"  data-toggle="modal" data-target="#create"><i class="fa fa-plus"></i> {{__('lang.create')}}  </button>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                    @include('pagination.paginate', ['controller' => "positions",'search' => $data['search'],'rows' => $data['rows']])
                    </div>
                    <div class="col-sm-12 col-md-6">
                    @include('pagination.search', ['controller' => "positions",'search' => $data['search']])
                    </div>
                    <div class="table-responsive text-light">
                    
                        <div class="col-sm-12">
                            <table data-order='[[ 0, "desc" ]]' class="table">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <!-- <th scope="col">{{ __('lang.terms_and_conditions') }} {{ __('lang.en') }}</th> -->
                                    <th scope="col">{{ __('lang.position_ar') }}</th>
                                    <th scope="col">{{ __('lang.position_en') }}</th>
                                    
                                    <th scope="col">{{ __('lang.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['positions'] as $index => $position)
                                    <tr>
                                        <td>{{ $position->id }}</td>
                                        <td>{{ $position->name_ar}}</td>
                                        <td>{{ $position->name_en}}</td>
                                        
                                        <td>
                                            <form class="wbd-form" action="{{ route('admins.positions.destroy', $position->id) }}" method="POST" enctype="multipart/form-data" >
                                                @csrf
                                                @method("DELETE")

                                                <a class="btn btn-warning" href="" data-toggle="modal" data-target="#edit-{{$position->id}}">{{ __('lang.edit') }}</a>
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
                    {{ $data['positions']->withQueryString()->onEachSide(1)->links('pagination.links') }}
                </div>
                
            </div>
            <div class="col-sm-12 col-md-2 ">

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="create" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
    <div class="modal-content ">
        <form action="{{ route('admins.positions.store') }}" method="POST" enctype="multipart/form-data">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="modal-header bg-dark">
        <h5 class="modal-title text-white">{{ __('lang.create') }}</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label >{{ __('lang.start') }}</label>
                <input type="text" class="form-control" name="name_ar" value="" required>
            </div>
            <div class="form-group">
                <label >{{ __('lang.ends') }}</label>
                <input type="text" class="form-control" name="name_en" value="" required>
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

@foreach($data['positions']  as $index => $position)
    <div class="modal fade" id="edit-{{$position->id}}" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-md">
        <div class="modal-content ">
            <form action="{{ route('admins.positions.update', $position->id ) }}" method="POST">
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
                    <label >{{ __('lang.start') }}</label>
                    <input type="text" class="form-control" name="name_ar" value="{{$position->name_ar}}" required>
                </div>
                <div class="form-group">
                    <label >{{ __('lang.ends') }}</label>
                    <input type="text" class="form-control" name="name_en" value="{{$position->name_en}}" required>
                </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-inverse-dark" data-dismiss="modal"><i class="fa fa-positions"></i> {{ __('lang.close') }}</button>
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