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
                        {{ __('Club Membership Requiaitions') }}
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
                                <th>Gym Member</th>
                                <th>Club</th>
                                <th>Request Date</th>
                                <th>Request Status</th>
                                <th class="text-center" colspan="3">Action</th>

                            </tr>
                            @foreach($requisitions as $requisition)
                                <tr class="{{((auth()->user()->id==$requisition->user_id && auth()->user()->user_type!=\App\Enums\UserTypeEnum::ADMIN)||(auth()->user()->user_type==\App\Enums\UserTypeEnum::ADMIN ))?'':'d-none'}}">
                                    <td>{{$requisition->id}}</td>
                                    <td>{{$requisition->user->name}}</td>
                                    <td>{{$requisition->club->name}}</td>
                                    <td>{{$requisition->request_date}}</td>
                                    <td>{{$requisition->status}}</td>
                                    <td>
                                        <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
                                                data-bs-target="#show_requisition_modal_{{$requisition->id}}">
                                            <i class="uil-eye"></i>&nbsp;Show
                                        </button>
                                        @include('requisitions.show_requisition_modal')
                                    </td>
                                    <td>
                                        <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
                                                data-bs-target="#edit_requisition_modal_{{$requisition->id}}">
                                            <i class="uil-pen"></i>&nbsp;Approve / Reject
                                        </button>
                                        @include('requisitions.edit_requisition_modal')

                                    </td>
                                    <td>

                                        <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
                                                data-bs-target="#delete_requisition_modal_{{$requisition->id}}">
                                            <i class="uil-trash"></i>&nbsp;Roll Back
                                        </button>
                                        @include('requisitions.delete_requisition_modal')
                                    </td>

                                </tr>
                            @endforeach
                        </table>
                        {{$requisitions->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
