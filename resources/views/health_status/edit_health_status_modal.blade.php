<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:43
 */
?>
<div id="edit_health_status_modal_{{$status->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('update-health-status',[$status->id])}}" method="post">
                @csrf
                @method('put')
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="standard-modalLabel">Update Health Status Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="name" class="form-label">Calories</label>
                        <input type="text" name="calorie" id="name" class="form-control @error('calorie') is-invalid @enderror" value="{{ $status->calorie }}" autocomplete="calorie" autofocus>
                        @error('calorie')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="height" class="form-label">Height</label>
                        <input type="text" name="height" id="height" class="form-control @error('height') is-invalid @enderror" value="{{ $status->height }}" autocomplete="height" autofocus>
                        @error('height')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="weight" class="form-label">Weight</label>
                        <input type="text" name="weight" id="weight" class="form-control @error('weight') is-invalid @enderror" value="{{ $status->weight }}" autocomplete="weight" autofocus>
                        @error('weight')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="fat" class="form-label">Fat</label>
                        <input type="text" name="fat" id="fat" class="form-control @error('fat') is-invalid @enderror" value="{{ $status->fat }}" autocomplete="fat" autofocus>
                        @error('fat')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="mb-1 col">
                        <label for="trainer" class="form-label">Trainer</label>
                        <select name="trainer_id" class="form-control @error('trainer_id') is-invalid @enderror"
                                value="{{ old('trainer_id') }}" autocomplete="trainer_id" autofocus>
                            <option value="">Choose Trainer</option>
                            @foreach($trainers as $trainer)
                                <option value="{{$trainer->id}}" @if($trainer->id==$status->trainer_id) selected @endif >{{$trainer->name}}</option>
                            @endforeach
                        </select>
                        @error('trainer_id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
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
                    <div class="mb-1">
                        <label for="remarks" class="form-label">Remarks</label>
                        <textarea name="remarks" class="form-control @error('remarks') is-invalid @enderror" autocomplete="remarks" autofocus>{{$status->remarks }}</textarea>
                        @error('remarks')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save"></i> Update Club Details</button>
                </div>
            </form>
        </div>
    </div>
</div>
