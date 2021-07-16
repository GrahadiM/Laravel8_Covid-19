
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona-19 @yield('title')</title>
    @include('user.layouts.css')
    @yield('style')
    
</head>

<body>
    <!--::header part start::-->
    @include('user.layouts.navbar')
    <!-- Header part end-->
    
    <!--::content part start::-->
    @yield('content')
    <!-- Content part end-->

    <!-- footer part start-->
    @include('user.layouts.footer')
    <!-- Footer part end-->

    @include('user.layouts.js')
    @yield('app')

</body>

</html>