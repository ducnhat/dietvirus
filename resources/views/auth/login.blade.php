@extends('..._layout.admin-login')

@section('content')
    <div class="row mb15 table-layout">
        <div class="col-xs-6 va-m pln">
            <a href="dashboard.html" title="Return to Dashboard">
                <img src="{{ asset('admin//img/logos/logo_white.png') }}" title="AdminDesigns Logo" class="img-responsive w250">
            </a>
        </div>

        <div class="col-xs-6 text-right va-b pr5">
            {{--<div class="login-links">--}}
                {{--<a href="{{ action('Admin\Auth\AuthController@getLogin') }}" class="active" title="Sign In">Đăng nhập</a>--}}
                {{--<span class="text-white"> | </span>--}}
                {{--<a href="{{ action('Admin\Auth\AuthController@getRegister') }}" class="" title="Register">Đăng ký</a>--}}
            {{--</div>--}}

        </div>

    </div>

    <div class="panel panel-info mt10 br-n">

        {{--<div class="panel-heading heading-border bg-white">--}}
            {{--<span class="panel-title hidden"><i class="fa fa-sign-in"></i>Đăng ký</span>--}}
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

        <!-- end .form-header section -->
        <form method="post" action="{{ action('Auth\AuthController@getLogin') }}" id="contact">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="panel-body bg-light p30">
                <div class="row">
                    <div class="col-sm-7 pr30">

                        {{--<div class="section row hidden">--}}
                            {{--<div class="col-md-4">--}}
                                {{--<a href="#" class="button btn-social facebook span-left mr5 btn-block">--}}
                                    {{--<span><i class="fa fa-facebook"></i>--}}
                                    {{--</span>Facebook</a>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-4">--}}
                                {{--<a href="#" class="button btn-social twitter span-left mr5 btn-block">--}}
                                    {{--<span><i class="fa fa-twitter"></i>--}}
                                    {{--</span>Twitter</a>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-4">--}}
                                {{--<a href="#" class="button btn-social googleplus span-left btn-block">--}}
                                    {{--<span><i class="fa fa-google-plus"></i>--}}
                                    {{--</span>Google+</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="section">
                            <label for="username" class="field-label text-muted fs18 mb10">{{ trans('form.email') }}</label>
                            <label for="username" class="field prepend-icon">
                                <input type="text" name="email" id="username" class="gui-input" placeholder="{{ trans('form.email') }}">
                                <label for="username" class="field-icon"><i class="fa fa-user"></i>
                                </label>
                            </label>
                        </div>
                        <!-- end section -->

                        <div class="section">
                            <label for="username" class="field-label text-muted fs18 mb10">{{ trans('form.password') }}</label>
                            <label for="password" class="field prepend-icon">
                                <input type="password" name="password" id="password" class="gui-input" placeholder="{{ trans('form.password') }}">
                                <label for="password" class="field-icon"><i class="fa fa-lock"></i>
                                </label>
                            </label>
                        </div>
                        <!-- end section -->

                    </div>
                    <div class="col-sm-5 br-l br-grey pl30">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Lỗi!</strong> Không thể đăng nhập<br><br>
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @else
                            <h3 class="mb25"> You'll Have Access To Your:</h3>
                            <p class="mb15">
                                <span class="fa fa-check text-success pr5"></span> Unlimited Email Storage</p>
                            <p class="mb15">
                                <span class="fa fa-check text-success pr5"></span> Unlimited Photo Sharing/Storage</p>
                            <p class="mb15">
                                <span class="fa fa-check text-success pr5"></span> Unlimited Downloads</p>
                            <p class="mb15">
                                <span class="fa fa-check text-success pr5"></span> Unlimited Service Tickets</p>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- end .form-body section -->
            <div class="panel-footer clearfix p10 ph15">
                <button type="submit" class="button btn-primary mr10 pull-right">Đăng nhập</button>
                <label class="switch block switch-primary pull-left input-align mt10">
                    <input type="checkbox" name="remember" id="remember" checked>
                    <label for="remember" data-on="{{ trans('form.yes') }}" data-off="{{ trans('form.no') }}"></label>
                    <span>{{ trans('form.remember_me') }}</span>
                </label>
            </div>
            <!-- end .form-footer section -->
        </form>
    </div>
@endsection
