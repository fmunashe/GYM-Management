<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 15:42
 */
?>
<div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{route('save-user')}}" method="post">
                @csrf
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="standard-modalLabel">New User Registration</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">

                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Full Name') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            </div>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" autocomplete="name" autofocus required>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Mobile Number') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            </div>
                            <input id="mobile" type="text"
                                   class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                   value="{{ old('mobile') }}" autocomplete="mobile" autofocus required>

                            @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Gender') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            </div>
                            <select id="gender" type="text"
                                    class="form-control @error('gender') is-invalid @enderror" name="gender"
                                    value="{{ old('gender') }}" autocomplete="gender" autofocus required>
                                <option value=""></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>

                            </select>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('User Type') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            </div>
                            <select id="user_type" type="text"
                                    class="form-control @error('user_type') is-invalid @enderror" name="user_type"
                                    value="{{ old('user_type') }}" autocomplete="user_type" autofocus required>
                                <option value=""></option>
                                @foreach(\App\Enums\UserTypeEnum::getUserTypes() as $type)
                                    <option value="{{$type}}">@if($type==\App\Enums\UserTypeEnum::MEMBER){{"Member"}}@elseif($type==\App\Enums\UserTypeEnum::TRAINER){{"Trainer"}}@else{{"Administrator"}}@endif</option>
                                @endforeach

                            </select>
                            @error('user_type')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Club') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            </div>
                            <select id="club_id" type="text"
                                    class="form-control @error('club_id') is-invalid @enderror" name="club_id"
                                    value="{{ old('club_id') }}" autocomplete="club_id" autofocus required>
                                <option value=""></option>
                                @foreach($clubs as $club)
                                    <option value="{{$club->id}}" class="{{(auth()->user()->club_id==$club->id || (auth()->user()->club->name=='WarmFit' && auth()->user()->user_type==\App\Enums\UserTypeEnum::ADMIN ))?'':'d-none'}}">{{$club->name}}</option>
                                @endforeach

                            </select>
                            @error('club_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Date Of Birth') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            </div>

                            <input id="dash-daterange" type="text"
                                   class="form-control @error('dob') is-invalid @enderror" name="dob"
                                   value="{{ old('dob') }}" autocomplete="dob" autofocus placeholder="01 (month) /24 (day) /1995 (year)">

                            @error('dob')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Email Address') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            </div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" autocomplete="email" required>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="input-group input-group-sm input-group-merge mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Password') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            </div>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password"
                                   autocomplete="new-password" required>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                    <span class="input-group-text"
                                          id="inputGroup-sizing-sm">{{ __('Confirm Password') }}</span>
                            </div>
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" autocomplete="new-password" required>
                        </div>

                        <div class="input-group input-group-sm mb-3">
                            <div class="form-check">
                                <input type="checkbox" id="individual_trainer" name="individual_trainer"
                                       class="form-check-input @error('individual_trainer') is-invalid @enderror" value="Yes"
                                       autocomplete="individual_trainer">
                                <label class="form-check-label" for="terms">Is Individual Trainer?</label>
                                @error('individual_trainer')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    <div class="input-group input-group-sm mb-3">
                            <div class="form-check">
                                <input type="checkbox" id="terms" name="terms"
                                       class="form-check-input @error('terms') is-invalid @enderror" value="Yes"
                                       autocomplete="terms" checked>
                                <label class="form-check-label" for="terms">I accept <a href="#" class="text-muted">Terms
                                        and Conditions</a></label>
                                @error('terms')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save"></i> Register Member</button>
                </div>
            </form>
        </div>
    </div>
</div>
