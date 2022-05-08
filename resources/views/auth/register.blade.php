<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Register | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
    <!-- App css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style"/>
    <link href="{{asset('assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style"/>


</head>

<body class="loading authentication-bg"
      data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-6 col-lg-5">
                <div class="card">
                    <!-- Logo-->
                    <div class="card-header pt-4 pb-4 text-center border-white">
                        <a href="{{route('register')}}">
                            <span><img src="{{asset('assets/images/new_logo.png')}}" alt=""
                                       class="card-img-top img-fluid" height="18"></span>
                        </a>
                    </div>

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center mt-0 fw-bold">Free Sign Up</h4>
                            <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a
                                minute </p>
                        </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Full Name') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                </div>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

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
                                       value="{{ old('mobile') }}" autocomplete="mobile" autofocus>

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
                                        value="{{ old('gender') }}" autocomplete="gender" autofocus>
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
                                        value="{{ old('user_type') }}" autocomplete="user_type" autofocus>
                                    <option value=""></option>
                                    @foreach(\App\Enums\UserTypeEnum::getUserTypes() as $type)
                                        <option value="{{$type}}"
                                                @if($type=='is_admin') hidden @endif>@if($type==\App\Enums\UserTypeEnum::MEMBER){{"Member"}}@elseif($type==\App\Enums\UserTypeEnum::TRAINER){{"Trainer"}}@endif</option>
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
                                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Date Of Birth') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                </div>

                                <input id="dash-daterange" type="text"
                                       class="form-control @error('dob') is-invalid @enderror" name="dob"
                                       value="{{ old('dob') }}" autocomplete="dob" autofocus>

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
                                       name="email" value="{{ old('email') }}" autocomplete="email">

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
                                       autocomplete="new-password">

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
                                       name="password_confirmation" autocomplete="new-password">
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <div class="form-check">
                                    <input type="checkbox" id="individual_trainer" name="individual_trainer"
                                           class="form-check-input @error('individual_trainer') is-invalid @enderror"
                                           @if(old('individual_trainer')) checked @endif value="1"
                                           autocomplete="individual_trainer">
                                    <label class="form-check-label" for="individual_trainer">Are You An Individual Trainer?</label>
                                    @error('individual_trainer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <div class="form-check">
                                    <input type="checkbox" id="club_owner" name="club_owner"
                                           class="form-check-input @error('club_owner') is-invalid @enderror"
                                           @if(old('club_owner')) checked @endif value="1"
                                           autocomplete="club_owner">
                                    <label class="form-check-label" for="club_owner">Club Owner ?</label>
                                    @error('club_owner')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="mb-1" id="club_name" style="display: none">
                                <label for="club_name" class="form-label">Club Name</label>
                                <input type="text" name="club_name" id="club_name"
                                       class="form-control @error('club_name') is-invalid @enderror"
                                       value="{{ old('club_name') }}" autocomplete="club_name" autofocus>
                                @error('club_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-1" id="location" style="display: none">
                                <label for="location" class="form-label">Club Location</label>
                                <input type="text" name="location"
                                       class="form-control @error('location') is-invalid @enderror"
                                       value="{{ old('location') }}" autocomplete="location" autofocus
                                       placeholder="location">
                                @error('location')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-1" id="description" style="display: none">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description"
                                          class="form-control @error('description') is-invalid @enderror"
                                          autocomplete="description" autofocus>{{ old('description') }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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

                            <div class="row">
                                <div class="mb-3 text-center col">
                                    <button class="btn btn-primary" type="submit"> Sign Up</button>
                                </div>
                                <div class="mb-3 text-center col">
                                    <p class="text-muted">Already have account? <a href="{{route('login')}}"
                                                                                   class="btn btn-primary"><b>Log In</b></a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->


            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<footer class="footer footer-alt">
    {{date('Y')}} &copy; WarmFit - Warm.co.zw
</footer>

<!-- bundle -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>
<script src="{{asset('assets/js/app.min.js')}}"></script>

<script src="{{asset('assets/js/pages/demo.dashboard.js')}}"></script>

<script>
    $(document).ready(function () {
        $("#club_owner").click(function () {
            if ($(this).is(":checked")) {
                $("#club_name").show();
                $("#location").show();
                $("#description").show();
            } else {
                $("#club_name").hide();
                $("#location").hide();
                $("#description").hide();
            }
        });

            if ($('#club_owner').is(":checked")) {
                $("#club_name").show();
                $("#location").show();
                $("#description").show();
            } else {
                $("#club_name").hide();
                $("#location").hide();
                $("#description").hide();
            }

    });
</script>
</body>
</html>
