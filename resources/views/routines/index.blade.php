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
                        {{ __('Daily Training Routines') }}
                        @if(auth()->user()->user_type==\App\Enums\UserTypeEnum::ADMIN||auth()->user()->user_type==\App\Enums\UserTypeEnum::TRAINER)
                            <a href="" class="btn btn-success float-end" data-bs-toggle="modal"
                               data-bs-target="#standard-modal"><i class="mdi mdi-pencil-plus"></i> Create Training
                                Routine</a>
                        @endif
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
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                                <th>Saturday</th>
                                <th>Sunday</th>
                                <th class="text-center" colspan="3">Action</th>
                            </tr>
                            @foreach($routines as $routine)
                                <tr class="{{(auth()->user()->id==$routine->trainer_id || auth()->user()->user_type==\App\Enums\UserTypeEnum::ADMIN||auth()->user()->user_type==\App\Enums\UserTypeEnum::MEMBER)?'':'d-none'}}">
                                    <td>{{$routine->id}}</td>
                                    <td>{{$routine->trainer->name}}</td>
                                    <td>{{$routine->name}}</td>
                                    <td>{{$routine->monday_routine}}</td>
                                    <td>{{$routine->tuesday_routine}}</td>
                                    <td>{{$routine->wednesday_routine}}</td>
                                    <td>{{$routine->thursday_routine}}</td>
                                    <td>{{$routine->friday_routine}}</td>
                                    <td>{{$routine->saturday_routine}}</td>
                                    <td>{{$routine->sunday_routine}}</td>

                                    <td>
                                        <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
                                                data-bs-target="#show_routine_modal_{{$routine->id}}">
                                            <i class="uil-eye"></i>&nbsp;Show
                                        </button>
                                        @include('routines.show_routine_modal')
                                    </td>
                                    @if(auth()->user()->user_type==\App\Enums\UserTypeEnum::ADMIN || auth()->user()->user_type==\App\Enums\UserTypeEnum::TRAINER)
                                        <td>
                                            <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
                                                    data-bs-target="#edit_routine_modal_{{$routine->id}}">
                                                <i class="uil-pen"></i>&nbsp;Edit
                                            </button>
                                            @include('routines.edit_routine_modal')
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
                                                    data-bs-target="#delete_routine_modal_{{$routine->id}}">
                                                <i class="uil-trash"></i>&nbsp;Delete
                                            </button>
                                            @include('routines.delete_routine_modal')
                                        </td>

                                    @endif
                                </tr>
                            @endforeach
                        </table>
                        {{$routines->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('routines.create_routine_modal')



@endsection
