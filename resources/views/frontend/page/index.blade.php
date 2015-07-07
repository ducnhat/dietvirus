@extends('_layout.flatastic')

@section('content')
<!--banners-->
@include('_panel.frontendBannerTop')

<div class="row clearfix">
    <!--left content column-->
    <section class="col-lg-9 col-md-9 col-sm-9 m_xs_bottom_30">
        @foreach($data as $row)
        <hr class="divider_type_3 m_bottom_30">
        <article class="m_bottom_20 clearfix">
            <a href="{{ action('PostController@show', ['id' => $row->id, 'slug' => convertStringToSlug($row->title)]) }}" class="photoframe d_block d_xs_inline_b f_xs_none wrapper shadow f_left m_right_20 m_bottom_10 r_corners">
                <img src="{{ asset($row->image) }}" class="tr_all_long_hover" alt="">
            </a>
            <div class="mini_post_content">
                <h3 class="m_bottom_5">
                    <a href="{{ action('PostController@show', ['id' => $row->id, 'slug' => convertStringToSlug($row->title)]) }}" class="color_dark fw_medium">
                        {{ $row->title }}
                    </a>
                </h3>
                <p class="f_size_medium m_bottom_10">
                    {{ $row->publish_at->format('H:i, d M Y') }},
                    <a href="#" class="color_dark">
                        {{ ($row->getComments()) ? $row->getComments()->count() : 0 }} {{ trans('post.comment') }}
                    </a>
                </p>
                <hr>
                <hr class="m_bottom_15">
                <p class="m_bottom_10">
                    {{ $row->description }}
                </p>
                {{--<a href="#" class="tt_uppercase f_size_large">Read More</a>--}}
            </div>
        </article>
        @endforeach
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

@endsection