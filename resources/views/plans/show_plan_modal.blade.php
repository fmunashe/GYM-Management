<?php
/**
 * Author: Farai Zihove
 * Date: 4/4/2022
 * Time: 08:23
 */
?>

<div id="show_plan_modal_{{$plan->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header modal-colored-header bg-info">
                    <h4 class="modal-title" id="danger-header-modalLabel">Plan Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
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
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


