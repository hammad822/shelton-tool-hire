@extends('layouts.auth-layout')
@section('title', 'Send email')

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
                            <figure class="rt-sendemailimage">
                                <img src={{asset('assets/images/emailicon.png')}} alt="" />
                            </figure>
                            <h2>Email has been sent!</h2>
                            <div class="rt-description">
                                <p>Check your inbox and click on th received link to reset password.</p>
                            </div>
                            <div class="form-group">
                                <a href="/resetpassword" class="rt-btn rt-btn-lg"><span>Continue</span></a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
