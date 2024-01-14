@extends('layouts.auth-layout')
@section('title', 'Reset Password')

@section('content')
<div class="rt-loginsignup">
    <div class="rt-loginsignup-area">
        <div class="rt-container">
            <div class="rt-loginsignup-content">
                <strong class="rt-logovertical">
                    <img src={{asset('assets/images/logo.svg')}} alt="" />
                </strong>
                <div class="rt-themefrombox rt-sendemail">
                    <form class="rt-themeform">
                        <fieldset>
                            <h2>Reset Password</h2>
                            <div class="rt-description">
                                <p>Please enter the new password below and press the reset button</p>
                            </div>
                            <div class="form-group">
                                <div class="rt-inputwithicon rt-inputwithbg">
                                    <input type="password" class="form-control" placeholder="New Password" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="rt-inputwithicon rt-inputwithbg">
                                    <input type="password" class="form-control" placeholder="Confirm New Password" />
                                </div>
                            </div>
                            <div class="form-group">
                                <a href="/" class="rt-btn rt-btn-lg"><span>Reset Password</span></a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
