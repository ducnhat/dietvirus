<li class="m_left_5 relative container3d" id="shopping_button">
    <a role="button" href="#" class="button_type_3 color_light bg_scheme_color d_block r_corners tr_delay_hover box_s_none">
        <span class="d_inline_middle shop_icon">
            <i class="fa fa-shopping-cart"></i>
            <span class="count tr_delay_hover type_2 circle t_align_c">{{ (!Cart::isEmpty()) ? Cart::getContent()->count() : 0 }}</span>
        </span>
        <b>{{ (!Cart::isEmpty()) ? money_format(Cart::getTotal()) : 0 }}</b>
    </a>
    <div class="shopping_cart top_arrow tr_all_hover r_corners">
        <div class="f_size_medium sc_header">{{ trans((!Cart::isEmpty()) ? 'cart.list_items' : 'cart.empty') }}</div>

        @if(!Cart::isEmpty())
        <ul class="products_list">
            @foreach(Cart::getContent() as $item)
            <li>
                <div class="clearfix">
                    <!--product description-->
                    <div class="f_left product_description">
                        <a href="#" class="color_dark m_bottom_5 d_block">{{ $item->name }}</a>
                        {{--<span class="f_size_medium">Product Code PS34</span>--}}
{{--                        <a href="#">{{ trans('cart.delete') }}</a>--}}
                        {!! Form::open(['method' => 'post', 'action' => ['CartController@removeItem'], 'id' => 'item-' . $item->id]) !!}
                        {!! Form::hidden('id', $item->id) !!}
                        <a id="remove-item" data-id="{{ $item->id }}" href="#">
                            <i class="fa fa-times m_right_5"></i>
                            {{ trans('cart.remove_item') }}
                        </a>
                        {!! Form::close() !!}
                    </div>
                    <!--product price-->
                    <div class="f_left f_size_medium">
                        <div class="clearfix">
                            {{ $item->quantity }} x <b class="color_dark">{{ money_format($item->price) }}</b>

                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>

        <!--total price-->
        <ul class="total_price bg_light_color_1 t_align_r color_dark">
            @if(count(Cart::getConditions()) > 0)
            <li class="m_bottom_10">
                {{ trans('coupon.discount') }}:
                <span class="f_size_large sc_price t_align_l d_inline_b m_left_15">
                    {{ money_format(Cart::getCondition('promo')->getCalculatedValue(Cart::getSubtotal())) }}
                </span>
            </li>
            @endif
            <li>
                {{ trans('cart.total') }}:
                <b class="f_size_large bold scheme_color sc_price t_align_l d_inline_b m_left_15">
                    {{ (!Cart::isEmpty()) ? money_format(Cart::getTotal()) : 0 }}
                </b>
            </li>
        </ul>
        <div class="sc_footer t_align_c">
            <a href="{{ action('CartController@index') }}" role="button" class="button_type_4 d_inline_middle bg_light_color_2 r_corners color_dark t_align_c tr_all_hover m_mxs_bottom_5">
                {{ trans('cart.view_cart') }}
            </a>
            <a href="{{ action('CartController@show') }}" role="button" class="button_type_4 bg_scheme_color d_inline_middle r_corners tr_all_hover color_light">
                {{ trans('cart.checkout') }}
            </a>
        </div>
        @endif
    </div>
</li>

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function(){
            $("a#remove-item").click(function(){
                var id = $(this).attr('data-id');
                $("form#item-" + id).submit();
            });
        });
    </script>

@endsection