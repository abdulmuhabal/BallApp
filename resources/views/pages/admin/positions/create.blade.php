@extends('layouts.admin')

@section('content')
<?php \App::getLocale() === "ar" ? $name_index = "name_ar" : $name_index = "name_en" ?>
<form action="{{ route('admins.shipment-requests.store') }}" method="POST" enctype="multipart/form-data" >
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <input name="role" type="hidden" value="ACCOUNTANT"/>
<div class="row">
    <div class="col-md-6">
    </div>
    <div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="row">
            
                <div class="col-md-12">
                    <h5 class="form-header text-uppercase">{{ __('lang.accountant') }} <i class="fa fa-user-circle"></i></h5>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">{{ __('lang.first_name') }} </label>
                                <div class="col-lg-9">
                                    <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{old('first_name', '')}}">
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">{{ __('lang.middle_name') }} </label>
                                <div class="col-lg-9">
                                    <input class="form-control @error('middle_name') is-invalid @enderror" type="text" name="middle_name" value="{{old('middle_name', '')}}">
                                    @error('middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">{{ __('lang.last_name') }} </label>
                                <div class="col-lg-9">
                                    <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{old('last_name', '')}}">
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">{{ __('lang.phone') }} </label>
                                <div class="col-lg-9">
                                    <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" value="{{old('phone', '')}}">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">{{ __('lang.password') }} </label>
                                <div class="col-lg-9">
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" value="">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">{{ __('lang.password_confirmation') }} </label>
                                <div class="col-lg-9">
                                    <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" value="">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">{{ __('lang.gender') }} </label>
                                <div class="col-lg-9">
                                    <select class="form-control @error('first_name') is-invalid @enderror" name="gender" id="">
                                        <option value="MALE" >{{ __('lang.male') }}</option>
                                        <option value="FEMALE" >{{ __('lang.female') }}</option>
                                    </select>
                                </div>
                            </div>

                        </div>  
                    </div>
                </div>
     
            </div>
            <div class="row no-print border-top pt-3">
                <div class="col-lg-12">
                    <div class="float-sm-right">
                    <button type="submit" class="btn btn-primary">{{ __('lang.submit') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

</form>
@endsection

