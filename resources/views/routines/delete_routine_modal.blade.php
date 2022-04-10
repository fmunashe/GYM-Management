<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:42
 */
?>

<div id="delete_routine_modal_{{$routine->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('delete-routine', [$routine->id]) }}" method="post" class="m-0">
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
                            <td>Trainer :</td>
                            <td>{{$routine->trainer->name}}</td>
                        </tr>
                        <tr>
                            <td>Name :</td>
                            <td>{{$routine->name}}</td>
                        </tr>
                        <tr>
                            <td>Monday :</td>
                            <td>{{$routine->monday_routine}}</td>
                        </tr>
                        <tr>
                            <td>Tuesday :</td>
                            <td>{{$routine->tuesday_routine}}</td>
                        </tr>
                        <tr>
                            <td>Wednesday :</td>
                            <td>{{$routine->wednesday_routine}}</td>
                        </tr>
                        <tr>
                            <td>Thursday :</td>
                            <td>{{$routine->thursday_routine}}</td>
                        </tr>
                        <tr>
                            <td>Friday :</td>
                            <td>{{$routine->friday_routine}}</td>
                        </tr>
                        <tr>
                            <td>Saturday :</td>
                            <td>{{$routine->saturday_routine}}</td>
                        </tr>
                        <tr>
                            <td>Sunday :</td>
                            <td>{{$routine->sunday_routine}}</td>
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


