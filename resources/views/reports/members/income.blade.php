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
                                {{ __('Income Per Month') }}
                                <span>Total Income for the specified Period is :  {{"$ ".number_format($total)}}</span>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <div class="app-search dropdown d-none d-lg-block">
                                        <form>
                                            <div class="input-group">
                                                <input type="text" name="date_range" class="form-control dropdown-toggle" placeholder="Search..."
                                                       id="top-search"  data-toggle="date-picker" data-cancel-class="btn-warning">
                                                <button class="input-group-text btn-primary" type="submit"> <span class="mdi mdi-magnify"></span>Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
                                <th>Plan</th>
                                <th>Amount</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>mobile</th>
                                <th>Payment Date</th>
                                <th>Payment Expiry Date</th>
                            </tr>
                            @foreach($incomes as $income)
                                <tr>
                                    <td>{{$income->id}}</td>
                                    <td>{{$income->plan->plan_name}}</td>
                                    <td>{{$income->plan->amount}}</td>
                                    <td>{{$income->user->name}}</td>
                                    <td>{{$income->user->email}}</td>
                                    <td>{{$income->user->mobile}}</td>
                                    <td>{{$income->payment_date}}</td>
                                    <td>{{$income->payment_expiry_date}}</td>
                                </tr>
                            @endforeach
                        </table>
                        {{$incomes->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
