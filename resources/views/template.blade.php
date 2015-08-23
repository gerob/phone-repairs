<!DOCTYPE html>
<html>
@include('partials/_header')
<body>

{{--@include('partials/_top_nav')--}}

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