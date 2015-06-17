@extends('_layout.flatastic')

@section('content')
<!--banners-->
@include('_panel.frontendBannerTop')

<div class="row clearfix">
    <!--left content column-->
    <section class="col-lg-9 col-md-9 col-sm-9 m_xs_bottom_30">
        <h2 class="tt_uppercase color_dark m_bottom_25">Giỏ hàng</h2>
        <!--cart table-->
        <table class="table_type_4 responsive_table full_width r_corners wraper shadow t_align_l t_xs_align_c m_bottom_30">
            <thead>
                <tr class="f_size_large">
                    <!--titles for td-->
                    <th class="t_align_c">Sản phẩm</th>
                    <th class="t_align_c">Giá</th>
                    <th class="t_align_c">Số lượng</th>
                    <th class="t_align_c">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!--Product name and image-->
                    <td data-title="Product Image &amp; name" class="t_md_align_c">
                        <a href="#" class="d_inline_b m_left_5 color_dark">Kaspersky Internet Security</a>
                    </td>

                    <!--product price-->
                    <td class="t_align_r" data-title="Price">
                        {{--<s>150.000đ</s>--}}
                        <p class="f_size_large color_dark">130.000đ</p>
                    </td>
                    <!--quanity-->
                    <td data-title="Quantity">
                        <input type="text" class="r_corners full_width" name="quantity">
                    </td>
                    <!--subtotal-->
                    <td class="t_align_r" data-title="Subtotal">
                        <p class="f_size_large fw_medium scheme_color">130.000đ</p>
                    </td>
                </tr>
                <!--prices-->
                <tr>
                    <td colspan="3">
                        <p class="fw_medium f_size_large t_align_r t_xs_align_c">Coupon Discount:</p>
                    </td>
                    <td class="t_align_r" colspan="1">
                        <p class="fw_medium f_size_large color_dark">-30.000đ</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <p class="fw_medium f_size_large t_align_r t_xs_align_c">Subtotal:</p>
                    </td>
                    <td class="t_align_r" colspan="1">
                        <p class="fw_medium f_size_large color_dark">100.000đ</p>
                    </td>
                </tr>
                <!--total-->
                <tr>
                    <td colspan="2" class="v_align_m d_ib_offset_large t_xs_align_l">
                        <!--coupon-->
                        {{-- class="d_ib_offset_0 d_inline_middle half_column d_xs_block w_xs_full m_xs_bottom_5"--}}
                        <form>
                            <input type="text" placeholder="Enter your coupon code" name="" class="r_corners f_size_medium">
                            <button class="button_type_4 r_corners bg_light_color_2 m_left_5 mw_0 tr_all_hover color_dark">Save</button>
                        </form>
                    </td>
                    <td class="t_align_r">
                        <p class="fw_medium f_size_large t_align_r scheme_color p_xs_hr_0 d_inline_middle half_column d_ib_offset_normal d_xs_block w_xs_full t_xs_align_c">Total:</p>
                    </td>
                    <td colspan="1" class="v_align_m">
                        <p class="fw_medium f_size_large scheme_color m_xs_bottom_10">100.000đ</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>

    <aside class="col-lg-3 col-md-3 col-sm-3">
        <!--widgets-->
            <figure class="widget shadow r_corners wrapper m_bottom_30">
                <figcaption>
                    <h3 class="color_light">Thông tin người mua</h3>
                </figcaption>
                <div class="widget_content">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 m_xs_bottom_30">
                            <form>
                                <ul>
                                    <li class="m_bottom_15">
                                        <label for="c_name_1" class="d_inline_b m_bottom_5 required">Họ tên</label>
                                        <input type="text" id="c_name_1" name="" class="r_corners full_width">
                                    </li>

                                    <li class="m_bottom_15">
                                        <label for="address_1" class="d_inline_b m_bottom_5 required">Địa chỉ email</label>
                                        <input type="text" id="address_1" name="" class="r_corners full_width">
                                    </li>
                                    <li class="m_bottom_15">
                                        <label for="address_1_1" class="d_inline_b m_bottom_5 required">Điện thoại</label>
                                        <input type="text" id="address_1_1" name="" class="r_corners full_width">
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </figure>
    </aside>

</div>
@endsection

@section('scripts')

<script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>

@endsection