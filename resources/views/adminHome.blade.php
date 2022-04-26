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

                            {{ __('You are logged in as Admin!') }}

                            <table class="table table-sm table-striped">
                                <tr>
                                    <th class="text-nowrap">Date Time</th>
                                    <th  class="text-nowrap">Client ID</th>
                                    <th class="text-nowrap">Source</th>
                                    <th class="text-nowrap">Destination</th>
                                    <th class="text-nowrap">D Context</th>
                                    <th class="text-nowrap">Source Trunk</th>
                                    <th class="text-nowrap">Destination Trunk</th>
                                    <th class="text-nowrap">Last App</th>
                                    <th class="text-nowrap">Last Data</th>
                                    <th class="text-nowrap">Duration</th>
                                    <th class="text-nowrap">Billable</th>
                                    <th class="text-nowrap">Disposition</th>
                                    <th class="text-nowrap">Amaflags</th>
                                    <th class="text-nowrap">Call Type</th>
                                    <th class="text-nowrap">Account Code</th>
                                    <th class="text-nowrap">Unique ID</th>
                                    <th class="text-nowrap">Record File</th>
                                    <th class="text-nowrap">Record Path</th>
                                    <th class="text-nowrap">Monitor File</th>
                                    <th class="text-nowrap">Monitor Path</th>
                                    <th class="text-nowrap">Destination Monitor File</th>
                                    <th class="text-nowrap">Destination Monitor Path</th>
                                    <th class="text-nowrap">Extension Field One</th>
                                    <th class="text-nowrap">Extension Field Two</th>
                                    <th class="text-nowrap">Extension Field Three</th>
                                    <th class="text-nowrap">Extension Field Four</th>
                                    <th class="text-nowrap">Extension Field Five</th>
                                    <th class="text-nowrap">Pay Account</th>
                                    <th class="text-nowrap">User Cost</th>
                                    <th class="text-nowrap">Did Number</th>
                                    <th class="text-nowrap">Trans Billing</th>
                                    <th class="text-nowrap">Pay Extension</th>
                                    <th class="text-nowrap">Source Chan Url</th>
                                    <th class="text-nowrap">Destination Chan Url</th>
                                    <th class="text-nowrap">Company Contact</th>
                                    <th class="text-nowrap">Personal Contact</th>
                                    <th class="text-nowrap">Contact Number</th>
                                    <th class="text-nowrap">Personal Contact TF</th>
                                </tr>
                                @foreach($data as $cdr)
                                    <tr>
                                        <td class="text-nowrap">{{$cdr->datetime}}</td>
                                        <td class="text-nowrap">{{$cdr->clid}}</td>
                                        <td class="text-nowrap">{{$cdr->src}}</td>
                                        <td class="text-nowrap">{{$cdr->dst}}</td>
                                        <td class="text-nowrap">{{$cdr->dcontext}}</td>
                                        <td class="text-nowrap">{{$cdr->srctrunk}}</td>
                                        <td class="text-nowrap">{{$cdr->dstrunk}}</td>
                                        <td class="text-nowrap">{{$cdr->lastapp}}</td>
                                        <td class="text-nowrap">{{$cdr->lastdata}}</td>
                                        <td class="text-nowrap">{{$cdr->duration}}</td>
                                        <td class="text-nowrap">{{$cdr->billable}}</td>
                                        <td class="text-nowrap">{{$cdr->disposition}}</td>
                                        <td class="text-nowrap">{{$cdr->amaflags}}</td>
                                        <td class="text-nowrap">{{$cdr->calltype}}</td>
                                        <td class="text-nowrap">{{$cdr->accountcode}}</td>
                                        <td class="text-nowrap">{{$cdr->uniqueid}}</td>
                                        <td class="text-nowrap">{{$cdr->recordfile}}</td>
                                        <td class="text-nowrap">{{$cdr->recordpath}}</td>
                                        <td class="text-nowrap">{{$cdr->monitorfile}}</td>
                                        <td class="text-nowrap">{{$cdr->monitorpath}}</td>
                                        <td class="text-nowrap">{{$cdr->dstmonitorfile}}</td>
                                        <td class="text-nowrap">{{$cdr->dstmonitorpath}}</td>
                                        <td class="text-nowrap">{{$cdr->extfield1}}</td>
                                        <td class="text-nowrap">{{$cdr->extfield2}}</td>
                                        <td class="text-nowrap">{{$cdr->extfield3}}</td>
                                        <td class="text-nowrap">{{$cdr->extfield4}}</td>
                                        <td class="text-nowrap">{{$cdr->extfield5}}</td>
                                        <td class="text-nowrap">{{$cdr->payaccount}}</td>
                                        <td class="text-nowrap">{{$cdr->usercost}}</td>
                                        <td class="text-nowrap">{{$cdr->didnumber}}</td>
                                        <td class="text-nowrap">{{$cdr->transbilling}}</td>
                                        <td class="text-nowrap">{{$cdr->payexten}}</td>
                                        <td class="text-nowrap">{{$cdr->srcchanurl}}</td>
                                        <td class="text-nowrap">{{$cdr->dstchanurl}}</td>
                                        <td class="text-nowrap">{{$cdr->companycontact}}</td>
                                        <td class="text-nowrap">{{$cdr->personalcontact}}</td>
                                        <td class="text-nowrap">{{$cdr->contactnumber}}</td>
                                        <td class="text-nowrap">{{$cdr->personalcontacttf}}</td>
                                    </tr>
                                @endforeach
                            </table>
                            {{$data->links()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
