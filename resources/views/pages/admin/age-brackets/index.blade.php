@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- <div class="card-header text-uppercase text-dark">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        {{ __('lang.age_brackets') }} 
                        
                    </div> 
                    <div class="col-sm-12 col-md-6">
  
                        <a class="btn btn-success float-left " data-toggle="modal" data-target="#create">{{ __('lang.create') }}</a>

                    </div>
            

            </div> -->
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-9">
                        <div class="card-header">
                            <h3 class="hidden-xs">{{ __('lang.age_brackets') }}</h3>
                        </div>  
                    </div>
                    <div class="col-3">
                        <button class="btn btn-success float-left"  data-toggle="modal" data-target="#create"><i class="fa fa-plus"></i> {{__('lang.create')}}  </button>
                    </div>
                    
                </div>
            
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                    @include('pagination.paginate', ['controller' => "age-brackets",'search' => $data['search'],'rows' => $data['rows']])
                    </div>
                    <div class="col-sm-12 col-md-6">
                    @include('pagination.search', ['controller' => "age-brackets",'search' => $data['search']])
                    </div>
                    <div class="table-responsive text-light">
                    
                        <div class="col-sm-12">
                            <table data-order='[[ 0, "desc" ]]' class="table">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <!-- <th scope="col">{{ __('lang.terms_and_conditions') }} {{ __('lang.en') }}</th> -->
                                    <th scope="col">{{ __('lang.age_bracket') }}</th>
                                    <th scope="col">{{ __('lang.max') }}</th>
                                    <th scope="col">{{ __('lang.min') }}</th>
                                    <th scope="col">{{ __('lang.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['age_brackets'] as $index => $age_bracket)
                                    <tr>
                                        <td>{{ $age_bracket->id }}</td>
                                        <td>{{ $age_bracket->name_ar}}</td>
                                        <td>{{ $age_bracket->max}}</td>
                                        <td>{{ $age_bracket->min}}</td>
                                        <td>
                                            <form class="wbd-form" action="{{ route('admins.age-brackets.destroy', $age_bracket->id) }}" method="POST" enctype="multipart/form-data" >
                                                @csrf
                                                @method("DELETE")

                                                <a class="btn btn-warning" href="" data-toggle="modal" data-target="#edit-{{$age_bracket->id}}">{{ __('lang.edit') }}</a>
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
                    {{ $data['age_brackets']->withQueryString()->onEachSide(1)->links('pagination.links') }}
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
        <form action="{{ route('admins.age-brackets.store') }}" method="POST" enctype="multipart/form-data">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="modal-header bg-dark">
        <h5 class="modal-title text-white">{{ __('lang.create') }}</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label >{{ __('lang.max') }}</label>
                <input type="number" class="form-control" name="min" value="" >
            </div>
            <div class="form-group">
                <label >{{ __('lang.min') }}</label>
                <input type="number" class="form-control" name="max" value="">
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

@foreach($data['age_brackets']  as $index => $age_bracket)
    <div class="modal fade" id="edit-{{$age_bracket->id}}" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-md">
        <div class="modal-content ">
            <form action="{{ route('admins.age-brackets.update', $age_bracket->id ) }}" method="POST">
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
                    <label >{{ __('lang.max') }}</label>
                    <input type="text" class="form-control" name="min" value="{{$age_bracket->min}}" >
                </div>
                <div class="form-group">
                    <label >{{ __('lang.min') }}</label>
                    <input type="text" class="form-control" name="max" value="{{$age_bracket->max}}">
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