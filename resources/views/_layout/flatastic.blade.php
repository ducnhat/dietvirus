<!doctype html>
<!--[if IE 9 ]><html class="ie9" lang="en"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <title>Flatastic - Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!--meta info-->
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="icon" type="image/ico" href="images/fav.ico">
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
        <section class="revolution_slider">
            @include('_panel.frontendSlider')
        </section>
        <!--content-->
        <div class="page_content_offset">
            <div class="container">
                <!--banners-->
                @include('_panel.frontendBannerTop')

                <!--carousel with filter-->
                <div class="wfilter_carousel m_bottom_30 m_xs_bottom_15">
                    @yield('content')
                </div>

                <!--banners-->
                <!--<section class="row clearfix m_bottom_45 m_sm_bottom_35">
						<div class="col-lg-6 col-md-6 col-sm-6 animate_half_tc">
							<a href="#" class="d_block banner wrapper r_corners relative m_xs_bottom_30">
								<img src="images/banner_img_1.png" alt="">
								<span class="banner_caption d_block vc_child t_align_c w_sm_auto">
									<span class="d_inline_middle">
										<span class="d_block color_dark tt_uppercase m_bottom_5 let_s">New Collection!</span>
										<span class="d_block divider_type_2 centered_db m_bottom_5"></span>
										<span class="d_block color_light tt_uppercase m_bottom_15 banner_title"><b>Colored Fashion</b></span>
										<span class="button_type_6 bg_scheme_color tt_uppercase r_corners color_light d_inline_b tr_all_hover box_s_none f_size_ex_large">Shop Now!</span>
									</span>
								</span>
							</a>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 animate_half_tc">
							<a href="#" class="d_block banner wrapper r_corners type_2 relative">
								<img src="images/banner_img_2.png" alt="">
								<span class="banner_caption d_block vc_child t_align_c w_sm_auto">
									<span class="d_inline_middle">
										<span class="d_block scheme_color banner_title type_2 m_bottom_0 m_mxs_bottom_5"><b>-50%</b></span>
										<span class="d_block divider_type_2 centered_db m_bottom_0 d_sm_none"></span>
										<span class="d_block color_light tt_uppercase m_bottom_15 m_md_bottom_5 d_mxs_none">On All<br><b>Sunglasses</b></span>
										<span class="button_type_6 bg_dark_color tt_uppercase r_corners color_light d_inline_b tr_all_hover box_s_none f_size_ex_large">Shop Now!</span>
									</span>
								</span>
							</a>
						</div>
					</section>-->
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