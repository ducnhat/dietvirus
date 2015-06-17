<li class="m_left_5 relative container3d" id="shopping_button">
    <a role="button" href="#" class="button_type_3 color_light bg_scheme_color d_block r_corners tr_delay_hover box_s_none">
        <span class="d_inline_middle shop_icon">
            <i class="fa fa-shopping-cart"></i>
            <span class="count tr_delay_hover type_2 circle t_align_c">3</span>
        </span>
        <b>$355</b>
    </a>
    <div class="shopping_cart top_arrow tr_all_hover r_corners">
        <div class="f_size_medium sc_header">Recently added item(s)</div>
        <ul class="products_list">
            <li>
                <div class="clearfix">
                    <!--product image-->
                    <img class="f_left m_right_10" src="{{ asset('frontend/images/shopping_c_img_1.jpg') }}" alt="">
                    <!--product description-->
                    <div class="f_left product_description">
                        <a href="#" class="color_dark m_bottom_5 d_block">Cursus eleifend elit aenean auctor wisi et urna</a>
                        <span class="f_size_medium">Product Code PS34</span>
                    </div>
                    <!--product price-->
                    <div class="f_left f_size_medium">
                        <div class="clearfix">
                            1 x <b class="color_dark">$99.00</b>
                        </div>
                        <button class="close_product color_dark tr_hover"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </li>
        </ul>
        <!--total price-->
        <ul class="total_price bg_light_color_1 t_align_r color_dark">
            <li class="m_bottom_10">
                Tax:
                <span class="f_size_large sc_price t_align_l d_inline_b m_left_15">
                    $0.00
                </span>
            </li>
            <li class="m_bottom_10">
                Discount:
                <span class="f_size_large sc_price t_align_l d_inline_b m_left_15">
                    $37.00
                </span>
            </li>
            <li>
                Total:
                <b class="f_size_large bold scheme_color sc_price t_align_l d_inline_b m_left_15">
                    $999.00
                </b>
            </li>
        </ul>
        <div class="sc_footer t_align_c">
            <a href="#" role="button" class="button_type_4 d_inline_middle bg_light_color_2 r_corners color_dark t_align_c tr_all_hover m_mxs_bottom_5">
                {{ trans('link.view_cart') }}
            </a>
            <a href="#" role="button" class="button_type_4 bg_scheme_color d_inline_middle r_corners tr_all_hover color_light">
                {{ trans('link.cart_checkout') }}
            </a>
        </div>
    </div>
</li>