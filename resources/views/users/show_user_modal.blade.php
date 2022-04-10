<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:43
 */
?>

<div id="show_user_modal_{{$user->id}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-full-width">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-info">
                <h4 class="modal-title" id="danger-header-modalLabel">Member Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <table class="table table-sm">
                    <tr>
                        <th>Name :</th>
                        <td>{{$user->name}}</td>
                        <th>Email :</th>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <th>Gender :</th>
                        <td>{{$user->gender}}</td>
                        <th>Mobile :</th>
                        <td>{{$user->mobile}}</td>
                    </tr>
                    <tr>
                        <th>DOB :</th>
                        <td>{{$user->dob}}</td>
                        <th>Joining Date :</th>
                        <td>{{$user->joining_date}}</td>
                    </tr>
                    <tr>
                        <th>User Type :</th>
                        <td>{{$user->user_type}}</td>
                        <th>Subscription Status :</th>
                        <td>{{$user->subscription_status}}</td>
                    </tr>
                    <tr>
                        <th>Club Name :</th>
                        <td>{{$user->club->name}}</td>
                        <th>Accepted Ts & Cs :</th>
                        <td>{{$user->terms_and_conditions}}</td>
                    </tr>

                </table>

                <div class="row">
                    <div class="col">
                        <div class="card table-responsive">
                            <div class="card-header modal-colored-header bg-info">
                                <p class="card-title">Health Status</p>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm">
                                    <tr class="alert-info">
                                        <th>#</th>
                                        <th>Calorie</th>
                                        <th>Trainer</th>
                                        <th>Weight</th>
                                        <th>Height</th>
                                        <th>Fat</th>
                                        <th>Remarks</th>
                                    </tr>
                                    @foreach($user->healthStatus as $status)
                                        <tr>
                                            <td>{{$status->id}}</td>
                                            <td>{{$status->calorie}}</td>
                                            <td>{{$status->trainer->name}}</td>
                                            <td>{{$status->weight}}</td>
                                            <td>{{$status->height}}</td>
                                            <td>{{$status->fat}}</td>
                                            <td>{{$status->calorie}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card table-responsive">
                            <div class="card-header modal-colored-header bg-info">
                                <p class="card-title">Payments Breakdown</p>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm">
                                    <tr class="alert-info">
                                        <th>#</th>
                                        <th>Plan</th>
                                        <th>Payment Date</th>
                                        <th>Payment Expiry Date</th>
                                    </tr>
                                    @foreach($user->payment as $pay)
                                        <tr>
                                            <td>{{$pay->id}}</td>
                                            <td>{{$pay->plan->plan_name}}</td>
                                            <td>{{$pay->payment_date}}</td>
                                            <td>{{$pay->payment_expiry_date}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                {{--                <table class="table table-sm">--}}
                {{--                    <tr class="modal-colored-header bg-info">--}}
                {{--                        <th colspan="10">Members</th>--}}
                {{--                    </tr>--}}
                {{--                    <tr class="table-info">--}}
                {{--                        <th>#</th>--}}
                {{--                        <th>Name</th>--}}
                {{--                        <th>Email</th>--}}
                {{--                        <th>mobile</th>--}}
                {{--                        <th>Gender</th>--}}
                {{--                        <th>DOB</th>--}}
                {{--                        <th>Joining Date</th>--}}
                {{--                        <th>Subscription Status</th>--}}
                {{--                        <th>User Type</th>--}}
                {{--                    </tr>--}}
                {{--                    @foreach($club->users as $member)--}}
                {{--                        <tr>--}}
                {{--                            <td>{{$member->id}}</td>--}}
                {{--                            <td>{{$member->name}}</td>--}}
                {{--                            <td>{{$member->email}}</td>--}}
                {{--                            <td>{{$member->mobile}}</td>--}}
                {{--                            <td>{{$member->gender}}</td>--}}
                {{--                            <td>{{$member->dob}}</td>--}}
                {{--                            <td>{{$member->joining_date}}</td>--}}
                {{--                            <td>{{$member->subscription_status}}</td>--}}
                {{--                            <td>--}}
                {{--                             @if($member->user_type=="is_admin")--}}
                {{--                                    {{"Admin"}}--}}
                {{--                                 @elseif($member->user_type=="is_member")--}}
                {{--                                    {{"Member"}}--}}
                {{--                                @elseif($member->user_type=="is_trainer")--}}
                {{--                                    {{"Trainer"}}--}}
                {{--                                 @endif--}}
                {{--                            </td>--}}
                {{--                        </tr>--}}
                {{--                    @endforeach--}}
                {{--                </table>--}}


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>


