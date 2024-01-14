@extends('layouts.auth-layout')
@section('title', 'Login')

@section('content')
    <div class="rt-loginsignup">
        <div class="rt-loginsignup-area">
            <div class="rt-container">
                <div class="rt-loginsignup-content">
                    <div class="rt-themefrombox">
                        <form class="rt-themeform" method="POST" action="{{ url('register') }}" enctype="multipart/form-data">
                            @csrf
                            <fieldset>
                                <div class="rt-heading">
                                    <h2>Sign Up</h2>
                                </div>
                                <div class="form-group">
                                    <div class="rt-inputwithbg">
                                        <label for="name">Image</label>
                                        <input id="name" type="file"
                                               class="form-control @error('file') is-invalid @enderror" name="file"
                                               required autocomplete="name" autofocus>

                                        @error('file')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="rt-inputwithbg">
                                        <label for="name">Name</label>
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="rt-inputwithbg">
                                        <label for="email">Email</label>
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="rt-inputwithbg">
                                        <label for="country">Account Type</label>
                                        <select class="form-control" style="height: 50px" name="role_id" id="country" required>
                                            <option value="">Select Account Type</option>
                                            <option value="2">Owner</option>
                                            <option value="3">User</option>

                                        </select>
                                        @error('role_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="rt-inputwithicon rt-inputwithbg">
                                        <label for="passowrd">Password</label>
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="rt-inputwithicon rt-inputwithbg">
                                        <label for="confirmPassword">Confirm Password</label>
                                        <input id="confirmPassword" type="password"
                                               class="form-control @error('password_confirmation') is-invalid @enderror"
                                               name="password_confirmation" required autocomplete="current-password">

                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <a href="{{url('/login')}}" class="rt-forgetpassword">Already have a account?</a>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="rt-btn2 rt-btn-lg"><span>sign up</span></button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
