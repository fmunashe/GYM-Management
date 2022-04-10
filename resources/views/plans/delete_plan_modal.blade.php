<?php
/**
 * Author: Farai Zihove
 * Date: 4/4/2022
 * Time: 08:23
 */
?>

<div id="delete_plan_modal_{{$plan->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('delete-plan', [$plan->id]) }}" method="post" class="m-0">
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
                            <td>Plan Name :</td>
                            <td>{{$plan->plan_name}}</td>
                        </tr>
                        <tr>
                            <td>Description :</td>
                            <td>{{$plan->description}}</td>
                        </tr>
                        <tr>
                            <td>Validity :</td>
                            <td>{{$plan->validity_period." days"}}</td>
                        </tr>
                        <tr>
                            <td>Amount :</td>
                            <td>{{$plan->amount}}</td>
                        </tr>
                        <tr>
                            <td>Status :</td>
                            <td>{{$plan->active}}</td>
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


