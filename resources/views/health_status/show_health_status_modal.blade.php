<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:43
 */
?>

<div id="show_health_status_modal_{{$status->id}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-info">
                <h4 class="modal-title" id="danger-header-modalLabel">Health Status Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
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
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>


