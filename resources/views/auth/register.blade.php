@extends('layouts.app',['hide_navbar' => true])


@section('page_css')
<link rel="stylesheet" href="{{ asset('css/signup.css')}}">
@endsection

@section('content')
<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card card-signin flex-row my-5">
                    <div class="card-img-left d-none d-md-flex">
                        <!-- Background image for card set in CSS! -->
                    </div>
                    <div class="card-body">

                        <h5 class="card-title text-center">
                            <img src="image/facebook_profile_image.png" alt="Icon" height="150" width="150">
                        </h5>

                        <form method="POST" class="form-signin" action="{{ route('register') }}">
                            <!-- <div class="form-label-group">
                <input type="text" id="inputUserame" class="form-control" placeholder="Username" required autofocus>
                <label for="inputUserame">Username</label>
              </div> -->

                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail
                                    Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password')
                                    }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" required>

                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{
                                    __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                        required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="region-dropdown" class="col-md-4 col-form-label text-md-right">{{
                                    __('Region') }}</label>
                            
                                <div class="col-md-6">
                                    <select class="form-control" id="region_id" name="region_id">
                                        @foreach($regions as $region)
                                            <option value="{{$region['id']}}">{{$region['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email" required>
                <label for="inputEmail">Email</label>
              </div> -->

                            <!-- <hr> -->

                            <!-- <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div> -->

                            <!-- <div class="form-label-group">
                <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" required>
                <label for="inputConfirmPassword">Confirm password</label>
              </div> -->

                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
                            <a class="btn btn-primary btn-lg btn-block text-uppercase" href="{{ route('login') }}" role="button">Sign
                                In</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


@endsection
