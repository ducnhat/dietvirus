<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<html lang="en">

@include('_panel.frontend_header')

<body>
@include('_panel.frontend_header_menu')

@include('_panel.frontend_navigation')

@yield('content')

@include('_panel.frontend_footer')

@include('_panel.frontend_js')


</body>
</html>