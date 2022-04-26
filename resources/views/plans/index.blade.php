<?php
/**
 * Author: Farai Zihove
 * Date: 3/4/2022
 * Time: 15:22
 */
?>
@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Membership Plans') }}
                        @if(auth()->user()->user_type==\App\Enums\UserTypeEnum::ADMIN)
                            <a href="" class="btn btn-success float-end" data-bs-toggle="modal"
                               data-bs-target="#standard-modal"><i class="mdi mdi-pencil-plus"></i> Create Membership
                                Plan</a>
                        @endif
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
                                <th>Club</th>
                                <th>Plan Name</th>
                                <th>Description</th>
                                <th>Validity Period</th>
                                <th>Amount</th>
                                <th>Status Active</th>
                                <th class="text-center" colspan="3">Action</th>
                            </tr>
                            @foreach($plans as $plan)
                                <tr class="{{(auth()->user()->club_id==$plan->club_id || (auth()->user()->club->name=='WarmFit' && auth()->user()->user_type==\App\Enums\UserTypeEnum::ADMIN ))?'':'d-none'}}">
                                    <td>{{$plan->id}}</td>
                                    <td>{{$plan->club->name}}</td>
                                    <td>{{$plan->plan_name}}</td>
                                    <td>{{$plan->description}}</td>
                                    <td>{{$plan->validity_period." days"}}</td>
                                    <td>{{$plan->amount}}</td>
                                    <td>{{$plan->active}}</td>

                                    <td>
                                        <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
                                                data-bs-target="#show_plan_modal_{{$plan->id}}">
                                            <i class="uil-eye"></i>&nbsp;Show
                                        </button>
                                        @include('plans.show_plan_modal')
                                    </td>
                                    @if(auth()->user()->user_type==\App\Enums\UserTypeEnum::ADMIN)
                                        <td>
                                            <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
                                                    data-bs-target="#edit_plan_modal_{{$plan->id}}">
                                                <i class="uil-pen"></i>&nbsp;Edit
                                            </button>
                                            @include('plans.edit_plan_modal')
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
                                                    data-bs-target="#delete_plan_modal_{{$plan->id}}">
                                                <i class="uil-trash"></i>&nbsp;Delete
                                            </button>
                                            @include('plans.delete_plan_modal')
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                        {{$plans->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

        @include('plans.create_plan_modal')
@endsection
@section('javascripts')
    <script>
        tinymce.init({
            selector: '#descriptions',
            plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: '{{auth()->user()->name}}',
        });
    </script>
@endsection
