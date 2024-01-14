@extends('layouts.auth-layout')
@section('title', 'Login')

@section('content')
    <div class="rt-loginsignup">
        <div class="rt-loginsignup-area">
            <div class="rt-container">
                <div class="rt-loginsignup-content">
                    <div class="rt-themefrombox">
                        <form class="rt-themeform" method="POST" action="{{ route('login') }}">
                            @csrf
                            <fieldset>
                                <div class="rt-heading">
                                    <h2>Sign In</h2>
                                    <p>Please login to your account.</p>
                                </div>
                                <div class="form-group">
                                    <div class="rt-inputwithbg">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="rt-inputwithicon rt-inputwithbg">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <a href="{{ route('password.request') }}" class="rt-forgetpassword">Forgot Your Password?</a>
                                </div>
                                <div class="form-group">
                                    <!-- <button type="submit" class="rt-btn2 rt-btn-lg"><span>sign in</span></button> -->
                                    <button type="submit" class="rt-btn2 rt-btn-lg"><span>sign in</span></button>
                                </div>
                                <div class="form-group d-flex">
                                    Create an account?  <a href="{{ url('/register') }}" class="text-dark p-0"> Signup!</a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
