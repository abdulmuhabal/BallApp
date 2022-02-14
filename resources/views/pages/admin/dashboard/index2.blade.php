<?php extract($data['completed_weekly_count']); ?>
@extends('layouts.admin')

@section('content')
<div class="row mt-3">
    <div class="col-12 col-lg-6 col-xl-3 mb-3">
        <div class="card gradient-violet">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="media-body">
                    <p class="text-white">{{ __('lang.service_providers') }}</p>
                    <h4 class="text-white line-height-5"> {{ $data['service_providers']->count() }}</h4>
                    </div>
                    <div class="w-circle-icon rounded-circle border border-white">
                    <i class="fa fa-tasks text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-12 col-lg-6 col-xl-3 mb-3">
        <div class="card gradient-scooter">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="media-body">
                    <p class="text-white">{{ __('lang.clients') }}</p>
                    <h4 class="text-white line-height-5">{{ $data['clients']->count() }}</h4>
                    </div>
                    <div class="w-circle-icon rounded-circle border border-white">
                    <i class="fa fa-car text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-3 mb-3">
        <div class="card gradient-ohhappiness">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="media-body">
                    <p class="text-white">{{ __('lang.pending_requests') }} </p>
                    <h4 class="text-white line-height-5">{{ $data['pending_requests']->count() }}</h4>
                    </div>
                    <div class="w-circle-icon rounded-circle border border-white">
                    <i class="fa fa-gears text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-3 mb-3">
        <div class="card gradient-bloody">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="media-body">
                    <p class="text-white">{{ __('lang.client_requests') }} </p>
                    <h4 class="text-white line-height-5">{{ $data['client_requests']->count() }}</h4>
                    </div>
                    <div class="w-circle-icon rounded-circle border border-white">
                    <i class="fa fa-truck text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-header">
                {{ __('lang.request_status') }} 
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="deliveryStatusChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-header">
                {{ __('lang.weekly_report') }} 
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="weeklyReportChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection


@push('footer')
<script>
    var cthtml1 = document.getElementById('deliveryStatusChart').getContext('2d');
    var deliveryStatusChart = new Chart(cthtml1, {
        type: 'doughnut',
        data: {
            labels: ['{{ __('lang.cancelled') }}', '{{ __('lang.pending') }}', '{{ __('lang.in_progress') }}', '{{ __('lang.completed') }}'],
            datasets: [{
                label: '{{ __('lang.delivery_status') }}',
                data: [ {{$data['cancelled_requests']->count()}}, {{$data['pending_requests']->count()}}, {{$data['accepted_requests']->count()}}, {{$data['completed_requests']->count()}}],
                backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(40, 167, 69, 1)',
                ],
            }]
        },
        options: {
            responsive: true,
            legend: {
                position: "left",
                rtl: true,
            },
            
        }
    });

    var cthtml2 = document.getElementById('weeklyReportChart').getContext('2d');
    var weeklyReportChart = new Chart(cthtml2, {
        type: 'line',
        data: {
            labels: [{{ date('d',strtotime('now - 6 days')) }}, {{ date('d',strtotime('now - 5 day')) }}, {{ date('d',strtotime('now - 4 days')) }}, 
            {{ date('d',strtotime('now - 3 days')) }}, {{ date('d',strtotime('now - 2 days')) }}, 
            {{ date('d',strtotime('now - 1 days')) }}, 
            {{ date('d',strtotime('now ')) }}],
            datasets: [{
                label: '{{ __('lang.completed_requests') }}',
                data: [{{$a}}, {{$b}},{{$c}}, {{$d}}, {{$e}}, {{$f}}, {{$g}}],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                lineTension: 0,
            }]
        },
        options: {
            legend: {
                position: "left",
                rtl: true,
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        userCallback: function(label, index, labels) {
                            // when the floored value is the same as the value we have a whole number
                            if (Math.floor(label) === label) {
                                return label;
                            }

                        },
                    }
                }],
            },
        }
    });

    var cthtml3 = document.getElementById('monthlyReportChart').getContext('2d');
    var monthlyReportChart = new Chart(cthtml3, {
        type: 'line',
        data: {
            labels: [{{ date('d',strtotime('now - 6 days')) }}, {{ date('d',strtotime('now - 5 day')) }}, {{ date('d',strtotime('now - 4 days')) }}, 
            {{ date('d',strtotime('now - 3 days')) }}, {{ date('d',strtotime('now - 2 days')) }}, 
            {{ date('d',strtotime('now - 1 days')) }}, 
            {{ date('d',strtotime('now ')) }}],
            datasets: [{
                label: '{{ __('lang.completed_requests') }}',
                data: [ 11, 22, 33, 44, 55, 95, 55],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                lineTension: 0,
            }]
        },
        options: {
            legend: {
                position: "left",
                rtl: true,
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        userCallback: function(label, index, labels) {
                            // when the floored value is the same as the value we have a whole number
                            if (Math.floor(label) === label) {
                                return label;
                            }

                        },
                    }
                }],
            },
        }
    });

</script>
@endpush