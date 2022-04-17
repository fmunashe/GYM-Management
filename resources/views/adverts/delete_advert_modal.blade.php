<?php
/**
 * Author: Farai Zihove
 * Date: 4/4/2022
 * Time: 08:23
 */
?>

<div id="delete_advert_modal_{{$advert->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('delete-advert', [$advert->id]) }}" method="post" class="m-0">
                @csrf
                @method('delete')
            <div class="modal-header modal-colored-header bg-danger">
                <h4 class="modal-title" id="danger-header-modalLabel">Confirm Delete</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <p class="justify-content-center">Please confirm you want to permanently delete this record?</p>
                <table class="table">
                <tr>
                    <td>Banner Name</td>
                    <td>{{$advert->image_name}}</td>
                </tr>
                    <tr>
                    <td>Title</td>
                    <td>{{$advert->title}}</td>
                </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{$advert->description}}</td>
                    </tr>
                    <tr>
                        <td>Published</td>
                        <td>{{$advert->publish?"Yes":"No"}}</td>
                    </tr>
                    <tr>
                        <td>Created Date</td>
                        <td>{{$advert->created_at->diffForHumans()}}</td>
                    </tr>  <tr>
                        <td>Last Updated</td>
                        <td>{{$advert->updated_at->diffForHumans()}}</td>
                    </tr>
                </table>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success " data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Yes Delete</button>
            </div>
        </form>
        </div>
    </div>
</div>


