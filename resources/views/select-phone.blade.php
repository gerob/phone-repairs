<!DOCTYPE html>
<html>
@include('partials/_header')
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

@include('partials/_top_nav')

<div class="container">
    @yield('content')
</div>

@include('partials/_footer')

</body>
</html>