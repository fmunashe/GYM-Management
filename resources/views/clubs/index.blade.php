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
                        {{ __('Registered Clubs') }}
                        @if(auth()->user()->user_type==\App\Enums\UserTypeEnum::ADMIN)   <a href=""
                                                                                            class="btn btn-success float-end"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#standard-modal"><i
                                class="mdi mdi-pencil-plus"></i> Create Club</a>
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
                                <th>Club Name</th>
                                <th>Description</th>
                                <th>Location</th>
                                <th>Total Members</th>
                                @if(auth()->user()->user_type==\App\Enums\UserTypeEnum::ADMIN)
                                <th class="text-center" colspan="3">Action</th>
                                    @endif
                            </tr>
                            @foreach($clubs as $club)
                                <tr>
                                    <td>{{$club->id}}</td>
                                    <td>{{$club->name}}</td>
                                    <td>{{$club->description}}</td>
                                    <td>{{$club->location}}</td>
                                    <td>{{$club->users_count}}</td>
                                    @if(auth()->user()->user_type==\App\Enums\UserTypeEnum::ADMIN)
                                    <td>
                                        <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
                                                data-bs-target="#show_club_modal_{{$club->id}}">
                                            <i class="uil-eye"></i>&nbsp;Show
                                        </button>
                                        @include('clubs.show_club_modal')
                                    </td>
                                    @if(((auth()->user()->club_id==$club->id && auth()->user()->user_type==\App\Enums\UserTypeEnum::ADMIN ) || (auth()->user()->club->name=='WarmFit' && auth()->user()->user_type==\App\Enums\UserTypeEnum::ADMIN )))
                                    <td>
                                        <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
                                                data-bs-target="#edit_club_modal_{{$club->id}}">
                                            <i class="uil-pen"></i>&nbsp;Edit
                                        </button>
                                        @include('clubs.edit_club_modal')

                                    </td>
                                    <td>

                                        <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
                                                data-bs-target="#delete_club_modal_{{$club->id}}">
                                            <i class="uil-trash"></i>&nbsp;Delete
                                        </button>
                                        @include('clubs.delete_club_modal')
                                    </td>
@endif
                                    @endif

                                </tr>
                            @endforeach
                        </table>
                        {{$clubs->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('clubs.create_club_modal')



@endsection
