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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{route('save-routine')}}" method="post">
                @csrf
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="standard-modalLabel">New Training Routine</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="mb-1 col">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name"
                                   class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                   autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        @if(auth()->user()->user_type==\App\Enums\UserTypeEnum::ADMIN)
                            <div class="mb-1 col">
                                <label for="status" class="form-label">Trainer</label>
                                <select name="trainer_id" class="form-control @error('trainer_id') is-invalid @enderror"
                                        value="{{ old('trainer_id') }}" autocomplete="trainer_id" autofocus>
                                    <option value="">Choose Trainer</option>
                                    @foreach($trainers as $trainer)
                                        <option value="{{$trainer->id}}">{{$trainer->name}}</option>
                                    @endforeach
                                </select>
                                @error('trainer_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        @else
                            <div class="mb-1 col">
                                <label for="status" class="form-label">Trainer</label>
                                <select name="trainer_id" class="form-control @error('trainer_id') is-invalid @enderror"
                                        value="{{ old('trainer_id') }}" autocomplete="trainer_id" autofocus>
                                    <option value="">Choose Trainer</option>
                                        <option value="{{auth()->user()->id}}">{{auth()->user()->name}}</option>
                                </select>
                                @error('trainer_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        @endif

                    </div>
                    <div class="row">
                        <div class="mb-1 col">
                            <label for="monday" class="form-label">Monday</label>
                            <textarea name="monday_routine"
                                      class="form-control @error('monday_routine') is-invalid @enderror"
                                      autocomplete="monday_routine" autofocus>{{ old('monday_routine') }}</textarea>
                            @error('monday_routine')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="mb-1 col">
                            <label for="tuesday_routine" class="form-label">Tuesday Training</label>
                            <textarea name="tuesday_routine"
                                      class="form-control @error('tuesday_routine') is-invalid @enderror"
                                      autocomplete="tuesday_routine" autofocus>{{ old('tuesday_routine') }}</textarea>
                            @error('tuesday_routine')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col">
                            <label for="wednesday_routine" class="form-label">Wednesday Training</label>
                            <textarea name="wednesday_routine"
                                      class="form-control @error('wednesday_routine') is-invalid @enderror"
                                      autocomplete="wednesday_routine"
                                      autofocus>{{ old('wednesday_routine') }}</textarea>
                            @error('wednesday_routine')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="mb-1 col">
                            <label for="thursday_routine" class="form-label">Thursday Training</label>
                            <textarea name="thursday_routine"
                                      class="form-control @error('thursday_routine') is-invalid @enderror"
                                      autocomplete="thursday_routine" autofocus>{{ old('thursday_routine') }}</textarea>
                            @error('thursday_routine')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-1 col">
                            <label for="friday_routine" class="form-label">Friday Training</label>
                            <textarea name="friday_routine"
                                      class="form-control @error('friday_routine') is-invalid @enderror"
                                      autocomplete="friday_routine" autofocus>{{ old('friday_routine') }}</textarea>
                            @error('friday_routine')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="mb-1 col">
                            <label for="saturday_routine" class="form-label">Saturday Training</label>
                            <textarea name="saturday_routine"
                                      class="form-control @error('saturday_routine') is-invalid @enderror"
                                      autocomplete="saturday_routine" autofocus>{{ old('saturday_routine') }}</textarea>
                            @error('saturday_routine')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-1">
                        <label for="sunday" class="form-label">Sunday Training</label>
                        <textarea name="sunday_routine"
                                  class="form-control @error('sunday_routine') is-invalid @enderror"
                                  autocomplete="sunday_routine" autofocus>{{ old('sunday_routine') }}</textarea>
                        @error('sunday_routine')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save"></i> Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
