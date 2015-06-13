<header>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3">
                <a href="index.html" id="logo">Learn</a>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9">
                @if (Auth::guest())
                <div class=" pull-right">
                    <a href="{{ url('/auth/login') }}" class="button_top" id="login_top">Sign in</a>
                    <a href="apply_2.html" class="button_top hidden-xs" id="apply">Apply now</a>
                </div>
                @else
                <ul class="pull-right user_panel">
                    <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#">Welcome, <strong>{{ Auth::user()->username }}</strong> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class=" icon-user"></i> Member area</a></li>
                            <li><a href="#"><i class=" icon-download"></i> Downloads</a></li>
                            <li><a href="#"><i class="icon-cog"></i> Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('/auth/logout') }}"><i class="icon-off"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
                @endif
                <ul id="top_nav" class="hidden-xs">
                    <li><a href="about_us.html">About</a></li>
                    <li><a href="apply.html">Wizard Apply</a></li>
                    @if (Auth::guest())
                    <li><a href="{{ url('/auth/register') }}">Register</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</header><!-- End header -->