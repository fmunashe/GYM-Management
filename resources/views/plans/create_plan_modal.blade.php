<?php
/**
 * Author: Farai Zihove
 * Date: 4/4/2022
 * Time: 08:18
 */
?>
<div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('save-plan')}}" method="post">
                @csrf
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="standard-modalLabel">Create Membership Plan</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="plan_name" class="form-label">Plan Name</label>
                        <input type="text" name="plan_name" id="plan_name"
                               class="form-control @error('plan_name') is-invalid @enderror"
                               value="{{ old('plan_name') }}" autocomplete="plan_name" autofocus>
                        @error('plan_name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description"
                                  class="form-control @error('description') is-invalid @enderror"
                                  autocomplete="description" autofocus>{{ old('description') }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="validity_period" class="form-label">Validity Period</label>
                        <select name="validity_period"
                                class="form-control @error('validity_period') is-invalid @enderror"
                                value="{{ old('validity_period') }}" autocomplete="validity_period" autofocus>
                            <option value="">Choose Period</option>
                            <option value="7">7 Days</option>
                            <option value="14">14 Days</option>
                            <option value="30">30 Days</option>
                        </select>
                        @error('validity_period')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" name="amount" id="amount"
                               class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}"
                               autocomplete="amount" autofocus>
                        @error('amount')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="status" class="form-label">Status</label>
                        <select name="active" class="form-control @error('active') is-invalid @enderror"
                                value="{{ old('active') }}" autocomplete="active" autofocus>
                            <option value="">Choose Status</option>
                            <option value="Yes">Active</option>
                            <option value="No">In-Active</option>
                        </select>
                        @error('active')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="status" class="form-label">Club</label>
                        <select name="club_id" class="form-control @error('club_id') is-invalid @enderror"
                                autocomplete="club_id" autofocus>
                            <option value="">Choose Club</option>
                            @foreach($clubs as $club)
                                <option value="{{$club->id}}" class="{{(auth()->user()->club_id == $club->id) ?'':'d-none'}}">{{$club->name}}</option>
                            @endforeach
                        </select>
                        @error('club_id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save"></i> Save Plan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

