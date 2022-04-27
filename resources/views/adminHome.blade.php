<?php
/**
 * Author: Farai Zihove
 * Date: 1/4/2022
 * Time: 20:14
 */
?>
@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="table-responsive">
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    {!! $registrations->container() !!}
                                </div>
                                <div class="col-md-6">
                                    {!! $clubs->container() !!}
                                </div>
                            </div>
                                <div class="row">
                                <div class="col">
                                    {!! $sales->container() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascripts')
    <script src="{{ $registrations->cdn() }}"></script>
    {{ $registrations->script() }}

    <script src="{{ $clubs->cdn() }}"></script>
    {{ $clubs->script() }}

    <script src="{{ $sales->cdn() }}"></script>
    {{ $sales->script() }}
@endsection
