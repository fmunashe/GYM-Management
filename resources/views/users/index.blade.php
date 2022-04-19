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
                        {{ __('Registered Members') }}
                        <a href="" class="btn btn-success float-end" data-bs-toggle="modal"
                           data-bs-target="#standard-modal"><i class="mdi mdi-pencil-plus"></i> Register Member</a>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Gender</th>
                                <th class="text-center" colspan="3">Action</th>
                            </tr>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->club?$user->club->name:""}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->mobile}}</td>
                                    <td>{{$user->gender}}</td>

                                    <td>
                                        <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
                                                data-bs-target="#show_user_modal_{{$user->id}}">
                                            <i class="uil-eye"></i>&nbsp;Show
                                        </button>
                                        @include('users.show_user_modal')
                                    </td>
                                    <td>
                                        <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
                                                data-bs-target="#edit_user_modal_{{$user->id}}">
                                            <i class="uil-pen"></i>&nbsp;Edit
                                        </button>
                                        @include('users.edit_user_modal')
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
                                                data-bs-target="#delete_user_modal_{{$user->id}}">
                                            <i class="uil-trash"></i>&nbsp;Delete
                                        </button>
                                        @include('users.delete_user_modal')
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('users.create_user_modal')



@endsection
