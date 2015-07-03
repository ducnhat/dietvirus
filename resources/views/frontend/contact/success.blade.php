@extends('_layout.flatastic')

@section('content')
    <!--banners-->
    @include('_panel.frontendBannerTop')

    <div class="row clearfix">
        <!--left content column-->
        <section class="col-lg-9 col-md-9 col-sm-9 m_xs_bottom_30">
            <h2 class="color_dark tt_uppercase m_bottom_25">{{ trans('contact.contact') }}</h2>
            <div class="bs_inner_offsets bg_light_color_3 shadow r_corners m_bottom_45">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 m_xs_bottom_30">
                        <ul>
                            <li>{{ trans('contact.submitted') }}</li>
                            <li class="t_align_r">
                                <button id="go-back" type="button" class="tr_delay_hover r_corners button_type_16 f_size_medium color_dark bg_light_color_2">{{ trans('form.go_back') }}</button>
                            </li>
                        </ul>
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

<script type="text/javascript">
    $(document).ready(function(){
        $("#go-back").click(function(){
            window.location.href = "{{ action('HomeController@index') }}";
        });
    });
</script>

@endsection