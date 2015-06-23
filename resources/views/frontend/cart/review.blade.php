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
                    <td class="t_align_c" data-title="Quantity">
                        <p class="f_size_large color_dark">{{ $item->quantity }}</p>
                    </td>
                    <!--subtotal-->
                    <td class="t_align_r" data-title="Subtotal">
                        <p class="f_size_large fw_medium scheme_color">{{ money_format($item->getPriceSum()) }}</p>
                    </td>
                </tr>
                @endforeach
                <!--prices-->
                <tr>
                    <td colspan="3">
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
                    <td colspan="3" class="t_align_r">
                        <p class="fw_medium f_size_large t_align_r scheme_color p_xs_hr_0 d_ib_offset_normal d_xs_block w_xs_full t_xs_align_c">{{ trans('cart.total') }}:</p>
                    </td>
                    <td colspan="1" class="t_align_r">
                        <p class="fw_medium f_size_large scheme_color m_xs_bottom_10">{{ money_format(Cart::getTotal()) }}</p>
                    </td>
                </tr>
            </tbody>
        </table>

        <h2 class="color_dark tt_uppercase m_bottom_25">{{ trans('cart.customer_info') }}</h2>
        @if(!empty($errors->all()))
            <div class="alert_box r_corners error m_bottom_0">
                <i class="fa fa-exclamation-triangle"></i>
                @foreach($errors->all() as $error)
                <p>{{ $error }} </p>
                @endforeach
            </div>
        @endif
        <div class="bs_inner_offsets bg_light_color_3 shadow r_corners m_bottom_45">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 m_xs_bottom_30">
                    {!! Form::open(['method' => 'post', 'action' => ['OrderController@index']]) !!}
                        <ul>
                            <li class="m_bottom_15">
                                <label for="f_name_1" class="d_inline_b m_bottom_5 required">{{ trans('cart.customer_name') }}</label>
                                {!! Form::Text('name', null, ['class' => 'r_corners full_width']) !!}
                            </li>
                            <li class="m_bottom_15">
                                <label for="m_name_1" class="d_inline_b m_bottom_5 required">{{ trans('cart.customer_email') }}</label>
                                {!! Form::Text('email', null, ['class' => 'r_corners full_width']) !!}
                            </li>
                            <li class="m_bottom_15">
                                <label for="l_name_1" class="d_inline_b m_bottom_5 required">{{ trans('cart.customer_phone') }}</label>
                                {!! Form::Text('phone', null, ['class' => 'r_corners full_width']) !!}
                            </li>
                            <li class="t_align_r">
                                <button type="submmit" class="button_type_6 bg_scheme_color f_size_large r_corners tr_all_hover color_light m_bottom_20">{{ trans('cart.confirm_payment') }}</button>
                            </li>
                        </ul>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>

    <aside class="col-lg-3 col-md-3 col-sm-3 t_align_c">
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