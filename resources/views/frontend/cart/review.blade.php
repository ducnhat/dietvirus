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
                    <th class="t_align_c">{{ trans('cart.product_name') }}</th>
                    <th class="t_align_c">{{ trans('cart.price') }}</th>
                    <th class="t_align_c">{{ trans('cart.quantity') }}</th>
                    <th class="t_align_c">{{ trans('cart.subtotal') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach(Cart::getContent() as $item)
                <tr>
                    <!--Product name and image-->
                    <td data-title="Product name" class="t_md_align_c">
                        <a href="#" class="d_inline_b m_left_5 color_dark">{{ $item->name }}</a>
                    </td>

                    <!--product price-->
                    <td class="t_align_r" data-title="Price">
                        {{--<s>150.000đ</s>--}}
                        <p class="f_size_large color_dark">{{ money_format($item->price) }}</p>
                    </td>
                    <!--quanity-->
                    <td data-title="Quantity">
                        <div class="clearfix quantity r_corners d_inline_middle f_size_medium color_dark m_bottom_10">
                        <button class="bg_tr d_block f_left" data-direction="down">-</button>
                        <input class="f_left f_left t_align_c" type="text" value="{{ $item->quantity }}" readonly="" id="quantity[{{ $item->id }}][]" />
                        <button class="bg_tr d_block f_left" data-direction="up">+</button>
                        </div>
                    </td>
                    <!--subtotal-->
                    <td class="t_align_r" data-title="Subtotal">
                        <p class="f_size_large fw_medium scheme_color">{{ money_format($item->getPriceSum()) }}</p>
                    </td>
                </tr>
                @endforeach
                <!--prices-->
                <tr>
                    <td colspan="1">
                        {!! Form::open(['method' => 'PATCH', 'action' => ['CartController@update'], 'id' => 'cart_items']) !!}
                        @foreach(Cart::getContent() as $item)
                            {!! Form::hidden('quantity[' . $item->id . '][]') !!}
                        @endforeach
                        <button id="updateCart" type="submit" class="tr_delay_hover r_corners button_type_16 f_size_medium bg_dark_color bg_cs_hover color_light m_xs_bottom_5">Cập nhật đơn hàng</button>
                        {!! Form::close() !!}
                    </td>
                    <td colspan="2">
                        <p class="fw_medium f_size_large t_align_r t_xs_align_c">{{ trans('cart.subtotal') }}:</p>
                    </td>
                    <td class="t_align_r" colspan="1">
                        <p class="fw_medium f_size_large color_dark">{{ money_format(Cart::getSubtotal()) }}</p>
                    </td>

                </tr>
                @if(count(Cart::getConditions()) > 0)
                <tr>
                    <td colspan="3">
                        <p class="fw_medium f_size_large t_align_r t_xs_align_c">{{ trans('coupon.discount') }}:</p>
                    </td>
                    <td class="t_align_r" colspan="1">
                        <p class="fw_medium f_size_large color_dark">-{{ money_format(Cart::getCondition('promo')->getCalculatedValue(Cart::getSubtotal())) }}</p>
                    </td>
                </tr>
                @endif
                <!--total-->
                <tr>
                    <td colspan="2" class="v_align_m t_xs_align_l">
                        <!--coupon-->
                        @if(count(Cart::getConditions()) == 0)
                        {!! Form::open(['method' => 'post', 'action' => ['CartController@coupon'], 'id' => 'coupon']) !!}
                            <input type="text" placeholder="{{ trans('cart.enter_coupon') }}" name="coupon" class="r_corners f_size_medium">
                            <button class="button_type_4 r_corners bg_light_color_2 m_left_5 mw_0 tr_all_hover color_dark">{{ trans('cart.apply') }}</button>
                        {!! Form::close() !!}
                        @else
                            {!! Form::open(['method' => 'post', 'action' => ['CartController@clearCoupon'], 'id' => 'coupon']) !!}
                            <input type="text" placeholder="{{ Cart::getCondition('promo')->getAttributes()['coupon'] }}" name="coupon" class="r_corners f_size_medium" readonly>
                            <button class="tr_delay_hover r_corners button_type_14 bg_scheme_color color_light">{{ trans('cart.remove') }}</button>
                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td class="t_align_r">
                        <p class="fw_medium f_size_large t_align_r scheme_color p_xs_hr_0 d_ib_offset_normal d_xs_block w_xs_full t_xs_align_c">{{ trans('cart.total') }}:</p>
                    </td>
                    <td colspan="1" class="t_align_r">
                        <p class="fw_medium f_size_large scheme_color m_xs_bottom_10">{{ money_format(Cart::getTotal()) }}</p>
                    </td>
                </tr>
                @if($error['error'])
                <tr>
                    <td colspan="4">
                        <div class="alert_box r_corners error m_bottom_10">
                            <i class="fa fa-exclamation-triangle"></i>
                            <p>{{ $error['message'] }} </p>
                        </div>
                    </td>
                </tr>
                @endif
                <tr>
                    <td class="t_align_r" colspan="4">
                        <button class="tr_delay_hover r_corners button_type_14 color_dark bg_light_color_2" type="submit">{{ trans('cart.continue') }}</button>
                        <button class="tr_delay_hover r_corners button_type_14 bg_scheme_color color_light" type="submit">{{ trans('cart.checkout') }}</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>

    <aside class="col-lg-3 col-md-3 col-sm-3 t_align_c">
        {{--<!--widgets-->--}}
            {{--<figure class="widget shadow r_corners wrapper m_bottom_30">--}}
                {{--<figcaption>--}}
                    {{--<h3 class="color_light">{{ trans('cart.payment') }}</h3>--}}
                {{--</figcaption>--}}
                {{--<div class="widget_content">--}}
                    {{--<div class="row clearfix">--}}
                        {{--<div class="col-lg-12 col-md-12 col-sm-12 m_xs_bottom_30">--}}
                            {{--<form>--}}
                                {{--<ul>--}}
                                    {{--<li class="m_bottom_15">--}}
                                        {{--<label for="c_name_1" class="d_inline_b m_bottom_5 required">{{ trans('cart.customer_name') }}</label>--}}
                                        {{--<input type="text" id="c_name_1" name="" class="r_corners full_width">--}}
                                    {{--</li>--}}

                                    {{--<li class="m_bottom_15">--}}
                                        {{--<label for="address_1" class="d_inline_b m_bottom_5 required">{{ trans('cart.customer_email') }}</label>--}}
                                        {{--<input type="text" id="address_1" name="" class="r_corners full_width">--}}
                                    {{--</li>--}}
                                    {{--<li class="m_bottom_15">--}}
                                        {{--<label for="address_1_1" class="d_inline_b m_bottom_5 required">{{ trans('cart.customer_phone') }}</label>--}}
                                        {{--<input type="text" id="address_1_1" name="" class="r_corners full_width">--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</form>--}}
                            {{----}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</figure>--}}
        <a class="d_block r_corners m_bottom_30" href="#">
            <img width="100%" alt="" src="{{ asset('upload/images/logo/bannershield.png') }}">
        </a>
        <a class="d_block r_corners m_bottom_30" href="#">
            <img width="85%" alt="" src="{{ asset('upload/images/logo/nganluong.png') }}">
        </a>
    </aside>

</div>
@endsection

@section('scripts')

<script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#updateCart").click(function(){
        $('input[id^="quantity"]').each(function(){
            var inputName = $(this).attr('id');
            $('input[name="' + inputName + '"]').val($(this).val());
        });
    });
});
</script>

@endsection