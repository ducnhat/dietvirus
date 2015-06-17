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
                                    <li class="current relative f_xs_none m_xs_bottom_5 m_left_10 m_xs_left_0"><a href="index.html" class="tr_delay_hover color_dark tt_uppercase r_corners"><b>Home</b></a>

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
                                    <li class="relative f_xs_none m_xs_bottom_5 m_left_10 m_xs_left_0"><a href="contact.html" class="tr_delay_hover color_dark tt_uppercase r_corners"><b>Contact</b></a></li>
                                </ul>
                            </nav>
                            {{--<button class="f_right search_button tr_all_hover f_xs_none d_xs_none">--}}
                                {{--<i class="fa fa-search"></i>--}}
                            {{--</button>--}}
                            <!--search form-->
                            {{--<div class="searchform_wrap type_2 bg_tr tf_xs_none tr_all_hover w_inherit">--}}
                                {{--<div class="container vc_child h_inherit relative w_inherit">--}}
                                    {{--<form role="search" class="d_inline_middle full_width">--}}
                                        {{--<input type="text" name="search" placeholder="Type text and hit enter" class="f_size_large p_hr_0">--}}
                                    {{--</form>--}}
                                    {{--<button class="close_search_form tr_all_hover d_xs_none color_dark">--}}
                                        {{--<i class="fa fa-times"></i>--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                        <ul class="f_right horizontal_list d_sm_inline_b f_sm_none clearfix t_align_l site_settings">
                            <!--like-->
                            {{--<li>--}}
                                {{--<a role="button" href="#" class="button_type_1 color_dark d_block bg_light_color_1 r_corners tr_delay_hover box_s_none"><i class="fa fa-heart-o f_size_ex_large"></i><span class="count circle t_align_c">12</span></a>--}}
                            {{--</li>--}}
                            {{--<li class="m_left_5">--}}
                                {{--<a role="button" href="#" class="button_type_1 color_dark d_block bg_light_color_1 r_corners tr_delay_hover box_s_none"><i class="fa fa-files-o f_size_ex_large"></i><span class="count circle t_align_c">3</span></a>--}}
                            {{--</li>--}}
                            <!--shopping cart-->
                            @include('_panel.frontendHeaderCart')
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="divider_type_6">
        </div>
    </section>
</header>