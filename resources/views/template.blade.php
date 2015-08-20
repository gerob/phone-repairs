<!DOCTYPE html>
<html>
@include('partials/_header')
<body>

{{--@include('partials/_top_nav')--}}

<div class="container">
    @yield('content')
</div>

@include('partials/_footer')

</body>
</html>