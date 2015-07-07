@extends('_layout.admin-register')

@section('content')
<!-- begin canvas animation bg -->
<div id="canvas-wrapper">
    <canvas id="demo-canvas"></canvas>
</div>

<!-- Begin: Content -->
<section id="content" class="">

    <div class="admin-form theme-info mw700" style="margin-top: 3%;" id="login1">

        <div class="row mb15 table-layout">

            <div class="col-xs-6 va-m pln">
                <a href="dashboard.html" title="Return to Dashboard">
                    <img src="{{ asset('admin/img/logos/logo_white.png') }}" title="AdminDesigns Logo" class="img-responsive w250">
                </a>
            </div>

            <div class="col-xs-6 text-right va-b pr5">
                <div class="login-links">
                    <a href="{{ action('Auth\AuthController@getLogin') }}" class="" title="Sign In">
                        {{ trans('link.login') }}
                    </a>
                    <span class="text-white"> | </span>
                    <a href="{{ action('Auth\AuthController@getRegister') }}" class="active" title="Register">
                        {{ trans('link.register') }}
                    </a>
                </div>

            </div>

        </div>

        <div class="panel panel-info mt10 br-n">

            {{--<div class="panel-heading heading-border bg-white">--}}
                {{--<div class="section row mn">--}}
                    {{--<div class="col-sm-4">--}}
                        {{--<a href="#" class="button btn-social facebook span-left mr5 btn-block">--}}
                            {{--<span><i class="fa fa-facebook"></i>--}}
                            {{--</span>Facebook</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-4">--}}
                        {{--<a href="#" class="button btn-social twitter span-left mr5 btn-block">--}}
                            {{--<span><i class="fa fa-twitter"></i>--}}
                            {{--</span>Twitter</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-4">--}}
                        {{--<a href="#" class="button btn-social googleplus span-left btn-block">--}}
                            {{--<span><i class="fa fa-google-plus"></i>--}}
                            {{--</span>Google+</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ action('Auth\AuthController@postRegister') }}" id="account2">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="panel-body p25 bg-light">
                    <div class="section-divider mt10 mb40">
                        <span>{{ trans('user\account.info') }}</span>
                    </div>
                    <!-- .section-divider -->

                    <div class="section">
                        <label for="first_name" class="field prepend-icon">
                            <input type="text" name="name" id="name" class="gui-input" placeholder="{{ trans('user\account.name') }}" value="{{ old('name') }}">
                            <label for="first_name" class="field-icon"><i class="fa fa-user"></i>
                            </label>
                        </label>
                    </div>
                    <!-- end .section row section -->

                    <div class="section">
                        <label for="email" class="field prepend-icon">
                            <input type="email" name="email" id="email" class="gui-input" placeholder="{{ trans('user\account.email') }}" value="{{ old('email') }}">
                            <label for="email" class="field-icon"><i class="fa fa-envelope"></i>
                            </label>
                        </label>
                    </div>
                    <!-- end section -->

                    <div class="section">
                        <label for="phone" class="field prepend-icon">
                            <input type="phone" name="phone" id="phone" class="gui-input" placeholder="{{ trans('user\account.phone') }}" value="{{ old('phone') }}">
                            <label for="phone" class="field-icon"><i class="fa fa-phone"></i>
                            </label>
                        </label>
                    </div>
                    <!-- end section -->

                    <div class="section">
                        <label for="password" class="field prepend-icon">
                            <input type="password" name="password" id="password" class="gui-input" placeholder="{{ trans('user\account.password') }}">
                            <label for="password" class="field-icon"><i class="fa fa-unlock-alt"></i>
                            </label>
                        </label>
                    </div>
                    <!-- end section -->

                    <div class="section">
                        <label for="password_confirmation" class="field prepend-icon">
                            <input type="password" name="repassword" id="password_confirmation" class="gui-input" placeholder="{{ trans('user\account.repassword') }}">
                            <label for="confirmPassword" class="field-icon"><i class="fa fa-lock"></i>
                            </label>
                        </label>
                    </div>
                    <!-- end section -->

                    <div class="section-divider mv40">
                        <span>{{ trans('user\account.terms_of_use') }}</span>
                    </div>
                    <!-- .section-divider -->

                    <div class="section mb15">
                        <label class="option block mt15">
                            <input type="checkbox" name="terms" value="1">
                            <span class="checkbox"></span>{{ trans('user\account.i_agree') }}
                            <a href="#" class="smart-link"> {{ trans('user\account.terms_of_use') }}. </a>
                        </label>
                    </div>
                    <!-- end section -->

                </div>
                <!-- end .form-body section -->
                <div class="panel-footer clearfix">
                    <button type="submit" class="button btn-primary pull-right">{{ trans('user\account.create') }}</button>
                </div>
                <!-- end .form-footer section -->
            </form>
        </div>
    </div>

</section>
<!-- End: Content -->
@endsection
