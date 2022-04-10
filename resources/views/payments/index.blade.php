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
                        @endif
                        <table class="table table-striped table-sm">
                            <tr>
                                <th>#</th>
                                <th>Client</th>
                                <th>Membership Plan</th>
                                <th>Validity</th>
                                <th>Amount</th>
                                <th>Payment Date</th>
                                <th>Payment Expiry Date</th>
                                <th class="text-center" colspan="2">Action</th>
                            </tr>
                            @foreach($payments as $payment)
                                <tr class="{{((auth()->user()->id==$payment->user_id && auth()->user()->user_type!=\App\Enums\UserTypeEnum::ADMIN)||auth()->user()->user_type==\App\Enums\UserTypeEnum::ADMIN)?'':'d-none'}}">
                                    <td>{{$payment->id}}</td>
                                    <td>{{$payment->user->name}}</td>
                                    <td>{{$payment->plan->plan_name}}</td>
                                    <td>{{$payment->plan->validity_period}}</td>
                                    <td>{{$payment->plan->amount}}</td>
                                    <td>{{$payment->payment_date}}</td>
                                    <td>{{$payment->payment_expiry_date}}</td>
                                    <td>
                                        <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
                                                data-bs-target="#show_payment_modal_{{$payment->id}}">
                                            <i class="uil-eye"></i>&nbsp;Show
                                        </button>
                                        @include('payments.show_payment_modal')
                                    </td>
{{--                                    <td>--}}
{{--                                        <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"--}}
{{--                                                data-bs-target="#edit_payment_modal_{{$payment->id}}">--}}
{{--                                            <i class="uil-pen"></i>&nbsp;Edit--}}
{{--                                        </button>--}}
{{--                                        @include('payments.edit_payment_modal')--}}
{{--                                    </td>--}}
                                    <td>
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
