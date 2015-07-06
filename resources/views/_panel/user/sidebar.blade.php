<!-- Start: Sidebar -->
<aside id="sidebar_left" class="nano nano-primary">
    <div class="nano-content">

        <!-- Start: Sidebar Header -->
        <header class="sidebar-header">
            <div class="user-menu">
                <div class="row text-center mbn">
                    <div class="col-xs-4">
                        <a href="dashboard.html" class="text-primary" data-toggle="tooltip" data-placement="top" title="Dashboard">
                            <span class="glyphicons glyphicons-home"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="pages_messages.html" class="text-info" data-toggle="tooltip" data-placement="top" title="Messages">
                            <span class="glyphicons glyphicons-inbox"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="pages_profile.html" class="text-alert" data-toggle="tooltip" data-placement="top" title="Tasks">
                            <span class="glyphicons glyphicons-bell"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="pages_timeline.html" class="text-system" data-toggle="tooltip" data-placement="top" title="Activity">
                            <span class="glyphicons glyphicons-imac"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="pages_profile.html" class="text-danger" data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicons glyphicons-settings"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="pages_gallery.html" class="text-warning" data-toggle="tooltip" data-placement="top" title="Cron Jobs">
                            <span class="glyphicons glyphicons-restart"></span>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <!-- End: Sidebar Header -->

        <!-- sidebar menu -->
        <ul class="nav sidebar-menu">
            <li class="pt20">
                <a href="{{ action('User\UserController@show', $currentUser->id) }}">
                    <span class="glyphicons glyphicons-user"></span>
                    <span class="sidebar-title">
                        {{ trans('member_link.account') }}
                    </span>
                </a>
            </li>

            <li>
                <a href="{{ action('User\OrderController@index') }}">
                    <span class="glyphicons glyphicons-notes"></span>
                    <span class="sidebar-title">
                        {{ trans('member_link.order') }}
                    </span>
                </a>
            </li>

            <li>
                <a href="{{ action('User\WarrantyController@index') }}">
                    <span class="glyphicons glyphicons-settings"></span>
                    <span class="sidebar-title">
                        {{ trans('member_link.warranty') }}
                    </span>
                </a>
            </li>

        </ul>
        <div class="sidebar-toggle-mini">
            <a href="#">
                <span class="fa fa-sign-out"></span>
            </a>
        </div>
    </div>
</aside>