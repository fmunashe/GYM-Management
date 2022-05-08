<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:42
 */
?>

<div id="approve_payment_modal_{{$payment->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="success-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('approve-payment', [$payment->id]) }}" method="post" class="m-0">
                @csrf
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="success-header-modalLabel">Confirm Approval</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <p class="">Please confirm you want to approve this payment:</p>
                    <hr>
                    <table class="table table-sm">
                        <tr>
                            <td>Client Name :</td>
                            <td>{{$payment->user?$payment->user->name:""}}</td>
                        </tr>
                        <tr>
                            <td>Membership Plan :</td>
                            <td>{{$payment->plan?$payment->plan->plan_name:""}}</td>
                        </tr>
                        <tr>
                            <td>Validity Period :</td>
                            <td>{{$payment->plan?$payment->plan->validity_period:""}}</td>
                        </tr>
                        <tr>
                            <td>Amount :</td>
                            <td>{{$payment->plan?$payment->plan->amount:""}}</td>
                        </tr>
                        <tr>
                            <td>Payment Date :</td>
                            <td>{{$payment->payment_date}}</td>
                        </tr>
                        <tr>
                            <td>Payment Expiry Date :</td>
                            <td>{{$payment->payment_expiry_date}}</td>
                        </tr>
                        <tr>
                            <td>Payment Status :</td>
                            <td>{{$payment->payment_status}}</td>
                        </tr>
                        <tr>
                            <td>Approved By :</td>
                            <td>{{$payment->approver?$payment->approver->name:""}}</td>
                        </tr>
                    </table>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Yes Approve</button>
                </div>
            </form>
        </div>
    </div>
</div>


