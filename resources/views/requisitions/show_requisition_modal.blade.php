<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:42
 */
?>

<div id="show_requisition_modal_{{$requisition->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="danger-header-modalLabel">Request Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-sm">
                        <tr>
                            <td># :</td>
                            <td>{{$requisition->id}}</td>
                        </tr>
                        <tr>
                            <td>Member :</td>
                            <td>{{$requisition->user->name}}</td>
                        </tr>
                        <tr>
                            <td>Club :</td>
                            <td>{{$requisition->club->name}}</td>
                        </tr>
                        <tr>
                            <td>Status :</td>
                            <td>{{$requisition->status}}</td>
                        </tr>
                        <tr>
                            <td>Request Date :</td>
                            <td>{{$requisition->request_date}}</td>
                        </tr>
                        <tr>
                            <td>Comments :</td>
                            <td>{{$requisition->comments}}</td>
                        </tr>
                    </table>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success " data-bs-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
</div>


