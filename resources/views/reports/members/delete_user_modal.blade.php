<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:42
 */
?>

<div id="delete_user_modal_{{$user->id}}" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="danger-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('delete-user', [$user->id]) }}" method="post" class="m-0">
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


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success " data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Yes Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>


