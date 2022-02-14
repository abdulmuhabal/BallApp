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
            <div class="card-header">{{__('lang.player_information')}} </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            
                            <div class="col-12 mb-3">
                                <div class="card bg-light">
                                    <div class="card-header bg-light">
                                        {{ __('lang.player') }}
                                    </div>
                                    <div class="card-body bg-light">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-12">
                                                    {{ __('lang.name') }}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ __('lang.phone') }}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ __('lang.email') }}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ __('lang.age') }}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ __('lang.gender') }}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ __('lang.level') }}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ __('lang.favorite_position') }}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ __('lang.height') }}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ __('lang.weight') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-12">
                                                    {{ $data['player']->name}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['player']->phone}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['player']->email}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['player']->player->age}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['player']->player->gender}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['player']->player->level}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['position']->name_ar}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['player']->player->height}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['player']->player->weight}}
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