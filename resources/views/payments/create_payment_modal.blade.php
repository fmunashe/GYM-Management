<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:42
 */
?>
<div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('save-payment')}}" method="post">
                @csrf
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="standard-modalLabel">Process Payment</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="plan" class="form-label">Membership Plan</label>
                        <select name="plan_id" id="plan_id" class="form-control @error('plan_id') is-invalid @enderror"
                                value="{{ old('plan_id') }}" autocomplete="plan_id" autofocus required>
                            <option value="">Choose Membership Plan</option>
                            @foreach($plans as $plan)
                                <option value="{{$plan}}" data-amount="{{$plan->amount}}"
                                        data-validity="{{$plan->validity_period}}">{{$plan->plan_name}}</option>
                            @endforeach
                        </select>
                        @error('plan_id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="mb-1">
                        <label for="name" class="form-label">Validity</label>
                        <input readonly type="text" name="validity_period" id="validity"
                               class="form-control @error('validity_period') is-invalid @enderror"
                               value="{{ old('validity_period') }}" autocomplete="validity_period" autofocus>
                        @error('validity_period')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="height" class="form-label">Amount</label>
                        <input type="text" name="amount" id="amount"
                               class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}"
                               autocomplete="amount" autofocus readonly>
                        @error('amount')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    @if(!auth()->user()->user_type!=\App\Enums\UserTypeEnum::ADMIN)
                        <div class="mb-1 col">
                            <label for="user_id" class="form-label">Client</label>
                            <select name="user_id" class="form-control @error('user_id') is-invalid @enderror"
                                    value="{{ old('user_id') }}" autocomplete="user_id" autofocus readonly="true">
                                <option value="{{auth()->user()->id}}">{{auth()->user()->name}}</option>
                            </select>
                            @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    @else
                        <div class="mb-1">
                            <label for="height" class="form-label">Client search</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search by client name..."
                                       id="client_search">
                                <button class="input-group-text btn-success mr-2" id="client_search_btn" type="button">
                                    Search
                                </button>

                                <button class="input-group-text btn-danger ml-2" id="client_reset_btn" type="button">
                                    Reset
                                </button>
                            </div>
                            @error('search')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="mb-1 col">
                            <label for="user_id" class="form-label">Client</label>
                            <select name="user_id" class="form-control @error('user_id') is-invalid @enderror"
                                    value="{{ old('user_id') }}" autocomplete="user_id" autofocus id="client_id"
                                    required>

                            </select>
                            @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    @endif


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save"></i> Make Payment
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="notify_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-danger">
                <h4 class="modal-title" id="danger-header-modalLabel">Search Response</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <p class="">No results found matching the search string provided!!!. Please try again with defferent search parameters.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success " data-bs-dismiss="modal">OK</button>
            </div>
            </form>
        </div>
    </div>
</div>



@section('javascripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#client_search_btn').click(function () {
                var text = $('#client_search').val();
                $.ajax({
                    url: 'search-client/' + text,
                    type: 'get',
                    dataType: 'json',
                    success: function (response) {
                        console.log(response.users);
                        var len = 0;
                        if (response.users != null) {
                            len = response.users.length;
                        }
                        if (len > 0) {
                            for (var i = 0; i < len; i++) {
                                var id = response.users[i].id;
                                var name = response.users[i].name;

                                var option = "<option value='" + id + "'>" + name + "</option>";

                                $("#client_id").append(option);
                            }
                        } else {
                            $('#notify_modal').modal('show');
                            $('#client_search').val(null);
                            $("#client_id").find('option').remove()
                        }
                    }
                });
            });
            $('#client_reset_btn').click(function () {
                $('#client_search').val(null);
                $("#client_id").find('option').remove()
            });


            $('#plan_id').change(function () {
                console.log(this);
                var amount = $(this).find(':selected').data('amount');
                var validity = $(this).find(':selected').data('validity');
                $("#validity").val(validity + " days");
                $("#amount").val("$ " + amount);
            });
        });
    </script>
@endsection
