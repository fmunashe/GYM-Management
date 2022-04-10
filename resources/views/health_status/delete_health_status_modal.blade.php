<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:42
 */
?>

<div id="delete_health_status_modal_{{$status->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('delete-health-status', [$status->id]) }}" method="post" class="m-0">
                @csrf
                @method('delete')
                <div class="modal-header modal-colored-header bg-danger">
                    <h4 class="modal-title" id="danger-header-modalLabel">Confirm Delete</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <p class="">Please confirm you want to permanently delete this record:</p>
                    <hr>
                    <table class="table table-sm">
                        <tr>
                            <td>Client Name :</td>
                            <td>{{$status->user->name}}</td>
                        </tr>
                        <tr>
                            <td>Trainer :</td>
                            <td>{{$status->trainer->name}}</td>
                        </tr>
                        <tr>
                            <td>Calorie :</td>
                            <td>{{$status->calorie}}</td>
                        </tr>
                        <tr>
                            <td>Height :</td>
                            <td>{{$status->height}}</td>
                        </tr>
                        <tr>
                            <td>Weight :</td>
                            <td>{{$status->weight}}</td>
                        </tr>
                        <tr>
                            <td>Fat :</td>
                            <td>{{$status->fat}}</td>
                        </tr>
                        <tr>
                            <td>Remarks :</td>
                            <td>{{$status->remarks}}</td>
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


