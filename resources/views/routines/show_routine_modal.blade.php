<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:43
 */
?>

<div id="show_routine_modal_{{$routine->id}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-full-width">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-info">
                <h4 class="modal-title" id="danger-header-modalLabel">Training Routine Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <table class="table table-sm">
                    <tr>
                        <td>Name :</td>
                        <td>{{$routine->name}}</td>
                    </tr>
                    <tr>
                        <td>Trainer :</td>
                        <td>
                            <span>Name:  {{$routine->trainer->name}}</span><br>
                            <span>Email:  {{$routine->trainer->email}}</span><br>
                            <span>Mobile:  {{$routine->trainer->mobile}}</span>
                        </td>
                    </tr>
                    <tr class="modal-colored-header bg-info">
                        <th colspan="2">Training Schedule</th>
                    </tr>
                    <tr class="table-info">
                        <th>Week Day</th>
                        <th>Routine</th>
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
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>


