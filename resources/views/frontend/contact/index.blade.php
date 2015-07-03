@extends('_layout.flatastic')

@section('content')
    <!--banners-->
    @include('_panel.frontendBannerTop')

    <div class="row clearfix">
        <!--left content column-->
        <section class="col-lg-9 col-md-9 col-sm-9 m_xs_bottom_30">
            <h2 class="color_dark tt_uppercase m_bottom_25">{{ trans('contact.contact') }}</h2>
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
                        {!! Form::open(['method' => 'post', 'action' => ['ContactController@index']]) !!}
                        <ul>
                            <li class="clearfix m_bottom_15">
                                <div class="f_left half_column">
                                    <label for="name" class="d_inline_b m_bottom_5 required">{{ trans('contact.name') }}</label>
                                    {!! Form::Text('name', null, ['class' => 'r_corners full_width']) !!}
                                </div>
                                <div class="f_left half_column">
                                    <label for="email" class="d_inline_b m_bottom_5 required">{{ trans('contact.email') }}</label>
                                    {!! Form::Text('email', null, ['class' => 'r_corners full_width']) !!}
                                </div>

                            </li>
                            <li class="m_bottom_15">
                                <label for="title" class="d_inline_b m_bottom_5 required">{{ trans('contact.title') }}</label>
                                {!! Form::Text('title', null, ['class' => 'r_corners full_width']) !!}
                            </li>
                            <li class="m_bottom_15">
                                <label for="message" class="d_inline_b m_bottom_5 required">{{ trans('contact.message') }}</label>
                                {!! Form::Textarea('message', null, ['class' => 'full_width r_corners', 'id' => 'cf_message']) !!}
                            </li>
                            <li class="t_align_r">
                                <button type="submmit" class="button_type_6 bg_scheme_color f_size_large r_corners tr_all_hover color_light m_bottom_20">{{ trans('contact.submit') }}</button>
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