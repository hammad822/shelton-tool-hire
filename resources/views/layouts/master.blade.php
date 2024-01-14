<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tool | @yield('title')</title>
{{--    <link rel="icon" href="favicon.ico" type="image/ico" />--}}
{{--    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">--}}
{{--    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">--}}
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    @include('includes.css')
</head>
<body>
<!--[if lt IE 8]>
<![endif]-->
<!--************************************
        Wrapper Start
*************************************-->
<div id="rt-wrapper" class="rt-wrapper">
    <!--************************************
            Header Start
    *************************************-->
    @include('includes.header')
    <!--************************************
                Header End
    *************************************-->
    <!--************************************
    *************************************-->
    <main id="rt-main" class="rt-main">
        @yield('content')
    </main>
</div>
<!--************************************
        Wrapper End
*************************************-->
@include('includes.js')

@yield('scripts')
<script src="{{asset('assets/js/toastr.min.js')}}"></script>

<script>
    @if(\Illuminate\Support\Facades\Session::has('success'))
    toastr.success("{{\Illuminate\Support\Facades\Session::get('success')}}", 'Success', {timeOut: 3000});

    @endif

    @if(\Illuminate\Support\Facades\Session::has('error'))
    toastr.error('{{\Illuminate\Support\Facades\Session::get('error')}}', 'error', {timeOut: 3000});
    @endif
</script>
<script>


</script>

</body>
</html>
