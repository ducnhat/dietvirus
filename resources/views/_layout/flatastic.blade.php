<!doctype html>
<!--[if IE 9 ]><html class="ie9" lang="en"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <title>Phần mềm diệt virut</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!--meta info-->
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="icon" type="image/ico" href="{{ asset('frontend/images/fav.ico') }}">
    <!--stylesheet include-->
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('frontend/css/settings.css') }}">
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('frontend/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('frontend/css/owl.transitions.css') }}">
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('frontend/css/jquery.custom-scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('frontend/css/style.css') }}">
    <!--font include-->
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
</head>

<body>
    <!--boxed layout-->
    <div class="wide_layout relative w_xs_auto">
        <!--[if (lt IE 9) | IE 9]>
				<div style="background:#fff;padding:8px 0 10px;">
				<div class="container" style="width:1170px;"><div class="row wrapper"><div class="clearfix" style="padding:9px 0 0;float:left;width:83%;"><i class="fa fa-exclamation-triangle scheme_color f_left m_right_10" style="font-size:25px;color:#e74c3c;"></i><b style="color:#e74c3c;">Attention! This page may not display correctly.</b> <b>You are using an outdated version of Internet Explorer. For a faster, safer browsing experience.</b></div><div class="t_align_r" style="float:left;width:16%;"><a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode" class="button_type_4 r_corners bg_scheme_color color_light d_inline_b t_align_c" target="_blank" style="margin-bottom:2px;">Update Now!</a></div></div></div></div>
			<![endif]-->
        <!--markup header-->
        @include('_panel.frontendHeader')
        <!--slider-->
        {{--<section class="revolution_slider">--}}
            {{--@include('_panel.frontendSlider')--}}
        {{--</section>--}}
        <!--content-->
        <div class="page_content_offset">
            <div class="container">
                <!--banners-->
                @include('_panel.frontendBannerTop')

                <!--carousel with filter-->
                <div class="wfilter_carousel m_bottom_30 m_xs_bottom_15">
                    @yield('content')
                </div>

            </div>
        </div>
        <!--markup footer-->
        @include('_panel.frontendFooter')
    </div>
    <button class="t_align_c r_corners type_2 tr_all_hover animate_ftl" id="go_to_top"><i class="fa fa-angle-up"></i></button>
    <!--scripts include-->
    @include('_panel.frontendJS')
</body>

</html>