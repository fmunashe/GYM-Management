@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard For Club '.auth()->user()->club->name) }}</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card text-white bg-info overflow-hidden">
                                    <div class="card-body">
                                        <div class="toll-free-box text-center">
                                            <h4> <i class="mdi mdi-cash-register"></i> Total Payments : {{$total_payments}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card text-white bg-danger overflow-hidden">
                                    <div class="card-body">
                                        <div class="toll-free-box text-center">
                                            <h4> <i class=""></i> Current Subscription Plan : {{$subscription_details?($subscription_details->plan?$subscription_details->plan->plan_name:""):""}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card bg-success text-white">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <h4> <i class="mdi mdi-clock-end"></i>Expiry Date : {{$subscription_details?\Carbon\Carbon::parse($subscription_details->payment_expiry_date)->format('d-M-Y'):""}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <livewire:regular-dashboard/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
