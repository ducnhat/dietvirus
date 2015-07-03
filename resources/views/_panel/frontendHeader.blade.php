<header role="banner" class="type_5">
    <!--header bottom part-->
    <section class="h_bot_part">
    <div class="menu_wrap">
            <div class="container">
                <div class="clearfix row">
                    <div class="col-lg-2 t_md_align_c m_md_bottom_15">
                        <a href="index.html" class="logo d_md_inline_b">
                            <img src="{{ asset('frontend/images/logo.png') }}" alt="">
                        </a>
                    </div>
                    <div class="col-lg-10 clearfix t_sm_align_c">
                        <div class="clearfix t_sm_align_l f_left f_sm_none relative s_form_wrap m_sm_bottom_15 p_xs_hr_0 m_xs_bottom_5">
                            <!--button for responsive menu-->
                            <button id="menu_button" class="r_corners centered_db d_none tr_all_hover d_xs_block m_xs_bottom_5">
                                <span class="centered_db r_corners"></span>
                                <span class="centered_db r_corners"></span>
                                <span class="centered_db r_corners"></span>
                            </button>
                            <!--main menu-->
                            <nav role="navigation" class="f_left f_xs_none d_xs_none m_right_35 m_md_right_30 m_sm_right_0">
                                <ul class="horizontal_list main_menu type_2 clearfix">
                                    <li class="current relative f_xs_none m_xs_bottom_5 m_left_10 m_xs_left_0"><a href="{{ action('HomeController@index') }}" class="tr_delay_hover color_dark tt_uppercase r_corners"><b>{{ trans('menu.home') }}</b></a>

                                    </li>

                                    <li class="relative f_xs_none m_xs_bottom_5 m_left_10 m_xs_left_0"><a href="blog.html" class="tr_delay_hover color_dark tt_uppercase r_corners"><b>Blog</b></a>
                                        <!--sub menu-->
                                        <div class="sub_menu_wrap top_arrow d_xs_none type_2 tr_all_hover clearfix r_corners">
                                            <ul class="sub_menu">
                                                <li><a class="color_dark tr_delay_hover" href="blog.html">Blog page</a></li>
                                                <li><a class="color_dark tr_delay_hover" href="blog_post.html">Single Blog Post page</a></li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li class="relative f_xs_none m_xs_bottom_5 m_left_10 m_xs_left_0"><a href="blog.html" class="tr_delay_hover color_dark tt_uppercase r_corners"><b>Features</b></a>
                                        <!--sub menu-->
                                        <div class="sub_menu_wrap top_arrow d_xs_none type_2 tr_all_hover clearfix r_corners">
                                            <ul class="sub_menu">
                                                <li><a class="color_dark tr_delay_hover" href="features_shortcodes.html">Shortcodes</a></li>
                                                <li><a class="color_dark tr_delay_hover" href="features_typography.html">Typography</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="relative f_xs_none m_xs_bottom_5 m_left_10 m_xs_left_0"><a href="{{ action('ContactController@index') }}" class="tr_delay_hover color_dark tt_uppercase r_corners"><b>{{ trans('contact.contact') }}</b></a></li>
                                </ul>
                            </nav>
                        </div>
                        <ul class="f_right horizontal_list d_sm_inline_b f_sm_none clearfix t_align_l site_settings">
                            @include('_panel.frontendHeaderCart')
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="divider_type_6">
        </div>
    </section>
</header>