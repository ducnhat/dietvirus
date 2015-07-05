@extends('_layout.flatastic')

@section('content')
    <!--banners-->
    @include('_panel.frontendBannerTop')

    <div class="row clearfix">
        <!--left content column-->
        <section class="col-lg-9 col-md-9 col-sm-9 m_xs_bottom_30">
            <!--blog post-->
            <article class="m_bottom_15">
                <div class="row clearfix m_bottom_15">
                    <div class="col-lg-9 col-md-9 col-sm-8">
                        <h2 class="m_bottom_5 color_dark fw_medium m_xs_bottom_10">
                            {{ $data->name }}
                        </h2>
                        {{--<p class="f_size_medium">{{ $data->publish_at->format('H:i, d M Y') }}, <a href="#" class="color_dark">{{ ($data->getComments()) ? $data->getComments()->count() : 0 }} {{ trans('post.comment') }}</a>, on <a href="#" class="color_dark">{{ $data->category->name }}</a></p>--}}
                    </div>
                </div>
                <!--post content-->
                <div class="m_bottom_15 t_align_j">
                    {!! $data->content !!}
                </div>
            </article>
            {{--<div class="m_bottom_30">--}}
                {{--<p class="d_inline_middle">Share this:</p>--}}
                {{--<div class="d_inline_middle m_left_5 addthis_widget_container">--}}
                    {{--<!-- AddThis Button BEGIN -->--}}
                    {{--<div class="addthis_toolbox addthis_default_style addthis_32x32_style">--}}
                        {{--<a class="addthis_button_preferred_1"></a>--}}
                        {{--<a class="addthis_button_preferred_2"></a>--}}
                        {{--<a class="addthis_button_preferred_3"></a>--}}
                        {{--<a class="addthis_button_preferred_4"></a>--}}
                        {{--<a class="addthis_button_compact"></a>--}}
                        {{--<a class="addthis_counter addthis_bubble_style"></a>--}}
                    {{--</div>--}}
                    {{--<!-- AddThis Button END -->--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<hr class="divider_type_3 m_bottom_10">--}}
            {{--<p class="m_bottom_10">More in this category: <a href="#" class="color_dark">Phasellus ullamcorper blandit leo, id pharetra leo » </a></p>--}}
            <hr class="divider_type_3 m_bottom_45">
{{--            @include('frontend.post.comments')--}}
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