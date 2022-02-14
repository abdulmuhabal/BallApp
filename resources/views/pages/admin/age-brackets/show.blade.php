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
            <div class="card-header">{{__('lang.trainer_information')}} </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            
                            <div class="col-12 mb-3">
                                <div class="card bg-light">
                                    <div class="card-header bg-light">
                                        {{ __('lang.trainer') }}
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
                                                    {{ __('lang.bio') }}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ __('lang.instagram_url') }}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ __('lang.youtube_url') }}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ __('lang.twitter_url') }}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ __('lang.whatsapp') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-12">
                                                    {{ $data['trainer']->name}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['trainer']->phone}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['trainer']->email}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['trainer']->trainer->age}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['trainer']->trainer->gender}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['trainer']->trainer->bio}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['trainer']->trainer->instagram_url}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['trainer']->trainer->youtube_url}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['trainer']->trainer->twitter_url}}
                                                    </div>
                                                    <div class="col-12">
                                                    {{ $data['trainer']->trainer->whatsapp}}
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