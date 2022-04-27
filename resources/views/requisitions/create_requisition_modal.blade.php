<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:42
 */
?>
<div id="create_requisition_modal_{{$club->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('requisitions.store')}}" method="post">
                @csrf
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="standard-modalLabel">Request To Join Club</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <input type="hidden" name="club_id" value="{{$club->id}}">
                    <p class="">Please confirm you want to join this club:</p>
                    <hr>
                    <table class="table table-sm">
                        <tr>
                            <td>Club Name :</td>
                            <td>{{$club->name}}</td>
                        </tr>
                        <tr>
                            <td>Description :</td>
                            <td>{{$club->description}}</td>
                        </tr>
                        <tr>
                            <td>Location :</td>
                            <td>{{$club->location}}</td>
                        </tr>
                    </table>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save"></i> Yes Submit Request</button>
                </div>
            </form>
        </div>
    </div>
</div>
