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
                        {{ __('Health Status Record Entries') }}
                        <a href="" class="btn btn-success float-end" data-bs-toggle="modal"
                           data-bs-target="#standard-modal"><i class="mdi mdi-pencil-plus"></i> Create Health Status Record</a>
                    </div>

                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-striped table-sm">
                            <tr>
                                <th>#</th>
                                <th>Member</th>
                                <th>Trainer</th>
                                <th>Calorie</th>
                                <th>Height</th>
                                <th>Weight</th>
                                <th>Fat</th>
                                <th>Remarks</th>
                                <th>Date</th>
                                <th class="text-center" colspan="3">Action</th>
                            </tr>
                            @foreach($statuses as $status)
                                <tr>
                                    <td>{{$status->id}}</td>
                                    <td>{{$status->user->name}}</td>
                                    <td>{{$status->trainer->name}}</td>
                                    <td>{{$status->calorie}}</td>
                                    <td>{{$status->height}}</td>
                                    <td>{{$status->weight}}</td>
                                    <td>{{$status->fat}}</td>
                                    <td>{{$status->remarks}}</td>
                                    <td>{{$status->created_at}}</td>

                                    <td>
                                        <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
                                                data-bs-target="#show_health_status_modal_{{$status->id}}">
                                            <i class="uil-eye"></i>&nbsp;Show
                                        </button>
                                        @include('health_status.show_health_status_modal')
                                    </td>
                                    <td>
                                        <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
                                                data-bs-target="#edit_health_status_modal_{{$status->id}}">
                                            <i class="uil-pen"></i>&nbsp;Edit
                                        </button>
                                        @include('health_status.edit_health_status_modal')
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
                                                data-bs-target="#delete_health_status_modal_{{$status->id}}">
                                            <i class="uil-trash"></i>&nbsp;Delete
                                        </button>
                                        @include('health_status.delete_health_status_modal')
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{$statuses->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('health_status.create_health_status_modal')



@endsection
