<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:43
 */
?>

<div id="show_club_modal_{{$club->id}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-full-width">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-info">
                <h4 class="modal-title" id="danger-header-modalLabel">Club Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
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
                    <tr>
                        <td>Total Members :</td>
                        <td>{{count($club->users)}}</td>
                    </tr>

                </table>
                <table class="table table-sm">
                    <tr class="modal-colored-header bg-info">
                        <th colspan="10">Members</th>
                    </tr>
                    <tr class="table-info">
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>mobile</th>
                        <th>Gender</th>
                        <th>DOB</th>
                        <th>Joining Date</th>
                        <th>Subscription Status</th>
                        <th>User Type</th>
                    </tr>
                    @foreach($club->users as $member)
                        <tr>
                            <td>{{$member->id}}</td>
                            <td>{{$member->name}}</td>
                            <td>{{$member->email}}</td>
                            <td>{{$member->mobile}}</td>
                            <td>{{$member->gender}}</td>
                            <td>{{$member->dob}}</td>
                            <td>{{$member->joining_date}}</td>
                            <td>{{$member->subscription_status}}</td>
                            <td>
                             @if($member->user_type=="is_admin")
                                    {{"Admin"}}
                                 @elseif($member->user_type=="is_member")
                                    {{"Member"}}
                                @elseif($member->user_type=="is_trainer")
                                    {{"Trainer"}}
                                 @endif
                            </td>
                        </tr>
                    @endforeach
                </table>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>


