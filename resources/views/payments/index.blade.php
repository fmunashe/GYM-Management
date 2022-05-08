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
                        {{ __('Payment Entries') }}
                        <a href="" class="btn btn-success float-end" data-bs-toggle="modal"
                           data-bs-target="#standard-modal"><i class="mdi mdi-pencil-plus"></i> Create Payment</a>
                    </div>

                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <table class="table table-striped table-sm">
                            <tr>
                                <th class="text-nowrap">#</th>
                                <th class="text-nowrap">Client</th>
                                <th class="text-nowrap">Club</th>
                                <th class="text-nowrap">Membership Plan</th>
                                <th class="text-nowrap">Validity</th>
                                <th class="text-nowrap">Amount</th>
                                <th class="text-nowrap">Payment Date</th>
                                <th class="text-nowrap">Payment Expiry Date</th>
                                <th class="text-nowrap">Approval Status</th>
                                <th class="text-nowrap">Approved By</th>
                                <th class="text-center" colspan="3">Action</th>
                            </tr>
                            @foreach($payments as $payment)
                                <tr class="{{((auth()->user()->id==$payment->user_id && auth()->user()->user_type!=\App\Enums\UserTypeEnum::ADMIN)||auth()->user()->user_type==\App\Enums\UserTypeEnum::ADMIN)?'':'d-none'}}">
                                    <td class="text-nowrap">{{$payment->id}}</td>
                                    <td class="text-nowrap">{{$payment->user?$payment->user->name:""}}</td>
                                    <td class="text-nowrap">{{$payment->user?$payment->user->club->name:""}}</td>
                                    <td class="text-nowrap">{{$payment->plan->plan_name}}</td>
                                    <td class="text-nowrap">{{$payment->plan->validity_period}}</td>
                                    <td class="text-nowrap">{{$payment->plan->amount}}</td>
                                    <td class="text-nowrap">{{$payment->payment_date}}</td>
                                    <td class="text-nowrap">{{$payment->payment_expiry_date}}</td>
                                    <td class="text-nowrap">{{$payment->payment_status}}</td>
                                    <td class="text-nowrap">{{$payment->approver?$payment->approver->name:""}}</td>
                                    <td class="text-nowrap">
                                        <button class="btn btn-info btn-sm py-0 px-1" data-bs-toggle="modal"
                                                data-bs-target="#show_payment_modal_{{$payment->id}}">
                                            <i class="uil-eye"></i>&nbsp;Show
                                        </button>
                                        @include('payments.show_payment_modal')
                                    </td>
                                    @if(auth()->user()->user_type==\App\Enums\UserTypeEnum::ADMIN)
                                    <td class="text-nowrap">
                                        <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
                                                data-bs-target="#approve_payment_modal_{{$payment->id}}">
                                            <i class="uil-file-check"></i>&nbsp;Approve
                                        </button>
                                        @include('payments.approve_payment_modal')
                                    </td>
                                    @endif

                                    <td class="text-nowrap">
                                        <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
                                                data-bs-target="#delete_payment_modal_{{$payment->id}}">
                                            <i class="uil-trash"></i>&nbsp;Roll Back
                                        </button>
                                        @include('payments.delete_payment_modal')
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{$payments->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('payments.create_payment_modal')



@endsection
