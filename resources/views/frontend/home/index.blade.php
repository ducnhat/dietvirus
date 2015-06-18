@extends('_layout.flatastic')

@section('content')
<!--banners-->
@include('_panel.frontendBannerTop')

<!--carousel with filter-->
<div class="wfilter_carousel m_bottom_30 m_xs_bottom_15">
    @foreach($data as $row)
        <figure class="r_corners photoframe shadow relative tr_all_hover filter_class_featured animate_ftb long">
            <!--product preview-->
            <a href="#" class="d_block relative pp_wrap">
                <!--hot product-->
                {{--<span class="hot_stripe"><img src="{{ asset('frontend/images/hot_product.png') }}" alt=""></span>--}}
                <img src="{{ $row->image }}" class="tr_all_hover" alt="">

            </a>
            <!--description and price of product-->
            <figcaption>
                <h5 class="m_bottom_10"><a href="#" class="color_dark ellipsis">{{ $row->name }}</a></h5>
                <div class="clearfix">
                    <p class="scheme_color f_left f_size_large m_bottom_15">{{ money_format($row->price) }}</p>
                    <!--rating-->
                    <ul class="horizontal_list f_right clearfix rating_list tr_all_hover">
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li class="active">
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                        <li>
                            <i class="fa fa-star-o empty tr_all_hover"></i>
                            <i class="fa fa-star active tr_all_hover"></i>
                        </li>
                    </ul>
                </div>
                {!! Form::open(['method' => 'post', 'action' => ['CartController@store']]) !!}
                    {!! Form::hidden('id', $row->id) !!}
                    {!! Form::hidden('name', $row->name) !!}
                    {!! Form::hidden('quantity', 1) !!}
                    {!! Form::hidden('price', $row->price) !!}
                    <button type="submit" class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0">{{ trans('link.add_to_cart') }}</button>
                {!! Form::close() !!}
            </figcaption>
        </figure>
    @endforeach
</div>
@endsection