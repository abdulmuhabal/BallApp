@extends('layouts.admin')

@section('css')
.borderless td, .borderless th {
    border: none;
}
@endsection 

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{__('lang.match_information')}} </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            
                            <div class="col-12 mb-3">
                                <div class="card bg-light">
                                    <div class="card-header bg-light">
                                        {{ __('lang.match') }}
                                    </div>
                                    <div class="card-body bg-light">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-12">
                                                    {{ __('lang.id') }}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ __('lang.title') }}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ __('lang.starts') }}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ __('lang.no_of_players') }}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ __('lang.no_of_reserve_players') }}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ __('lang.referee') }}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ __('lang.description') }}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ __('lang.gender') }}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ __('lang.age_bracket') }}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ __('lang.stadium_location') }}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ __('lang.stadium_location_long') }}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ __('lang.stadium_location_lat') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-12">
                                                    {{ $data['match']->id}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['match']->title}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['match']->starts}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['match']->no_of_players}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['match']->no_of_reserve_players}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['match']->referee}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['match']->description}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['match']->gender}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['match']->starts}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['match']->age_bracket}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['match']->stadium_location}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['match']->stadium_location_long}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['match']->stadium_location_lat}}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection