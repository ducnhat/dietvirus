@extends('..._layout.admin-register')

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
                    <a href="{{ url('/auth/login') }}" class="" title="Sign In">{{Lang::get('messages.login')}}</a>
                    <span class="text-white"> | </span>
                    <a href="{{ url('/auth/register') }}" class="active" title="Register">{{Lang::get('messages.register')}}</a>
                </div>

            </div>

        </div>

        <div class="panel panel-info mt10 br-n">

            <div class="panel-heading heading-border bg-white">
                <div class="section row mn">
                    <div class="col-sm-4">
                        <a href="#" class="button btn-social facebook span-left mr5 btn-block">
                            <span><i class="fa fa-facebook"></i>
                            </span>Facebook</a>
                    </div>
                    <div class="col-sm-4">
                        <a href="#" class="button btn-social twitter span-left mr5 btn-block">
                            <span><i class="fa fa-twitter"></i>
                            </span>Twitter</a>
                    </div>
                    <div class="col-sm-4">
                        <a href="#" class="button btn-social googleplus span-left btn-block">
                            <span><i class="fa fa-google-plus"></i>
                            </span>Google+</a>
                    </div>
                </div>
            </div>

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

            <form method="post" action="{{ url('/auth/register') }}" id="account2">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="panel-body p25 bg-light">
                    <div class="section-divider mt10 mb40">
                        <span>Set up your account</span>
                    </div>
                    <!-- .section-divider -->

                    <div class="section row">
                        <div class="col-md-6">
                            <label for="first_name" class="field prepend-icon">
                                <input type="text" name="first_name" id="first_name" class="gui-input" placeholder="First name..." value="{{ old('first_name') }}">
                                <label for="first_name" class="field-icon"><i class="fa fa-user"></i>
                                </label>
                            </label>
                        </div>
                        <!-- end section -->

                        <div class="col-md-6">
                            <label for="last_name" class="field prepend-icon">
                                <input type="text" name="last_name" id="last_name" class="gui-input" placeholder="Last name..." value="{{ old('last_name') }}">
                                <label for="last_name" class="field-icon"><i class="fa fa-user"></i>
                                </label>
                            </label>
                        </div>
                        <!-- end section -->
                    </div>
                    <!-- end .section row section -->

                    <div class="section">
                        <label for="email" class="field prepend-icon">
                            <input type="email" name="email" id="email" class="gui-input" placeholder="Email address" value="{{ old('email') }}">
                            <label for="email" class="field-icon"><i class="fa fa-envelope"></i>
                            </label>
                        </label>
                    </div>
                    <!-- end section -->

                    <div class="section">
                        <div class="smart-widget sm-right smr-120">
                            <label for="username" class="field prepend-icon">
                                <input type="text" name="username" id="username" class="gui-input" placeholder="Choose your username">
                                <label for="username" class="field-icon"><i class="fa fa-user"></i>
                                </label>
                            </label>
                            <label for="username" class="button">.envato.com</label>
                        </div>
                        <!-- end .smart-widget section -->
                    </div>
                    <!-- end section -->

                    <div class="section">
                        <label for="password" class="field prepend-icon">
                            <input type="password" name="password" id="password" class="gui-input" placeholder="Create a password">
                            <label for="password" class="field-icon"><i class="fa fa-unlock-alt"></i>
                            </label>
                        </label>
                    </div>
                    <!-- end section -->

                    <div class="section">
                        <label for="password_confirmation" class="field prepend-icon">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="gui-input" placeholder="Retype your password">
                            <label for="confirmPassword" class="field-icon"><i class="fa fa-lock"></i>
                            </label>
                        </label>
                    </div>
                    <!-- end section -->

                    <div class="section-divider mv40">
                        <span>Review the Terms</span>
                    </div>
                    <!-- .section-divider -->

                    <div class="section mb15">
                        <label class="option block">
                            <input type="checkbox" name="trial">
                            <span class="checkbox"></span>Sign me up for a
                            <a href="#" class="smart-link"> 7-day free PRO trial. </a>
                        </label>
                        <label class="option block mt15">
                            <input type="checkbox" name="terms">
                            <span class="checkbox"></span>I agree to the
                            <a href="#" class="smart-link"> terms of use. </a>
                        </label>
                    </div>
                    <!-- end section -->

                </div>
                <!-- end .form-body section -->
                <div class="panel-footer clearfix">
                    <button type="submit" class="button btn-primary pull-right">Create Account</button>
                </div>
                <!-- end .form-footer section -->
            </form>
        </div>
    </div>

</section>
<!-- End: Content -->
@endsection
