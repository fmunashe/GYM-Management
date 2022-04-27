<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:43
 */
?>
<div id="edit_requisition_modal_{{$requisition->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('requisitions.update',[$requisition->id])}}" method="post">
                @csrf
                @method('put')
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="standard-modalLabel">Update Requisition Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="name" class="form-label">Member Name</label>
                        <input type="text" name="user_id" id="user_id" class="form-control" value="{{ $requisition->user->name }}" autocomplete="user_id" readonly autofocus>
                    </div>
                    <div class="mb-1">
                        <label for="name" class="form-label">Club Name</label>
                        <input type="text" name="club_id" id="club_id" class="form-control" value="{{ $requisition->club->name }}" autocomplete="club_id" readonly autofocus>
                    </div>

                    <div class="mb-1">
                        <label for="name" class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="Pending">Pending</option>
                        <option value="Approved">Approve</option>
                        <option value="Rejected">Reject</option>
                    </select>
                    </div>

                    <div class="mb-1">
                        <label for="description" class="form-label">Comments</label>
                        <textarea name="comments" class="form-control" autocomplete="comments" autofocus>{{ $requisition->comments }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save"></i> Update Requisition Details</button>
                </div>
            </form>
        </div>
    </div>
</div>
