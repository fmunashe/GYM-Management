<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:40
 */
?>
@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-7">
                                {{ __('Clients subscribed For Training') }}
                            </div>
                            <div class="col-md-5">

                            </div>
                        </div>
                    </div>

                    <div class="card-body text-center table-responsive">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-striped table-sm">
                            <tr>
                                <th>#</th>
                                <th>Trainer</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Gender</th>
                                <th>Joining Date</th>
                                <th>Subscription Status</th>
                            </tr>
                            @foreach($clients as $client)
                                <tr>
                                    <td>{{$client->id}}</td>
                                    <td>{{$client->trainer->name}}</td>
                                    <td>{{$client->user->name}}</td>
                                    <td>{{$client->user->email}}</td>
                                    <td>{{$client->user->mobile}}</td>
                                    <td>{{$client->user->gender}}</td>
                                    <td>{{$client->user->joining_date}}</td>
                                    <td>{{$client->user->subscription_status}}</td>
                                </tr>
                            @endforeach
                        </table>
                        {{$clients->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
