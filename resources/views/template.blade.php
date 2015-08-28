<!DOCTYPE html>
<html>
@include('partials/_header')
<body>

{{--@include('partials/_top_nav')--}}
@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible success-message" role="alert">
        <div class="container center-all">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> {{Session::get('success')}}
        </div>
    </div>
@endif

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">

            <div class="panel panel-default">
                <img src="/img/stLogo1.png" alt="Square Trade" class="panel-logo">

                @include ('partials/_top_nav')

                @yield('content')
            </div>
        </div>
    </div>
</div>

@include('partials/_footer')

</body>
</html>