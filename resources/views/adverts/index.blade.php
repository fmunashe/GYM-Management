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
                        {{ __('Adverts') }}
                        <a href="" class="btn btn-success float-end" data-bs-toggle="modal"
                           data-bs-target="#standard-modal"><i class="mdi mdi-pencil-plus"></i> Post Advert</a>
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
                                <th>Banner Name</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Published</th>
                                <th class="text-center" colspan="2">Action</th>
                            </tr>
                            @foreach($adverts as $advert)
                                <tr>
                                    <td>{{$advert->id}}</td>
                                    <td>{{$advert->image_name}}</td>
                                    <td>{{$advert->title}}</td>
                                    <td>{{$advert->description}}</td>
                                    <td>{{$advert->publish?"Yes":"No"}}</td>
                                    <td>

                                        <button class="btn btn-danger btn-sm py-0 px-1" data-bs-toggle="modal"
                                                data-bs-target="#delete_advert_modal_{{$advert->id}}">
                                            <i class="fa fa-times"></i>&nbsp;Delete
                                        </button>
                                        @include('adverts.delete_advert_modal')
                                    </td>
                                    <td>
                                        <button class="btn btn-success btn-sm py-0 px-1" data-bs-toggle="modal"
                                                data-bs-target="#publish_advert_modal_{{$advert->id}}">
                                            <i class="fa fa-times"></i>&nbsp;Publish
                                        </button>
                                        @include('adverts.publish_advert_modal')
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                            {{$adverts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('adverts.create_advert_modal')



@endsection
