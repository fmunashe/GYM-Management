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
                                {{ __('Audit History') }}
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
                                <th>Action User</th>
                                <th>Entity</th>
                                <th>Event</th>
                                <th>Old Value</th>
                                <th>New Value</th>
                                <th>Date</th>
                            </tr>
                            @foreach($audits as $audit)
                                <tr>
                                    <td>{{$audit->id}}</td>
                                    <td>{{$audit->user_id?$audit->user->name:''}}</td>
                                    <td>{{$audit->auditable_type}}</td>
                                    <td>{{$audit->event}}</td>
                                    <td>
                                        <ul>
                                        @foreach($audit->old_values as $old)
                                                <li> {{$old}}</li>
                                        @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                        @foreach($audit->new_values as $new)
                                                <li>{{$new}}</li>
                                        @endforeach
                                        </ul>
                                    </td>
                                    <td>{{$audit->created_at}}</td>
                                </tr>
                            @endforeach
                        </table>
                        {{$audits->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
