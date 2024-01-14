@extends('layouts.auth-layout')
@section('title', 'Forget Password')

@section('content')
<div class="rt-loginsignup">
    <div class="rt-loginsignup-area">
        <div class="rt-container">
            <div class="rt-loginsignup-content">
                <strong class="rt-logovertical">
                    <img src={{asset('assets/images/logo.svg')}} alt="" />
                </strong>
                <div class="rt-themefrombox">
                    <form class="rt-themeform">
                        <fieldset>
                            <div class="rt-heading">
                                <h2>Forgot Password?</h2>
                            </div>
                            <div class="rt-description">
                                <p>Enter your registered email to receive password reset instructions.</p>
                            </div>
                            <div class="form-group">
                                <div class="rt-inputwithbg">
                                    <input name="email" type="email" class="form-control" placeholder="Email" />
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- <button type="submit" class="rt-btn2 rt-btn-lg"><span>Submit</span></button> -->
                                <a href="/sendemail" class="rt-btn2 rt-btn-lg"><span>Submit</span></a>
                            </div>
                            <div class="form-group">
                                <p>Remember Password? <a href="/">Login</a></p>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
