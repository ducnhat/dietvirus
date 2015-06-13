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
            <li class="sidebar-label pt20">Tài khoản</li>
            <li>
                <a class="accordion-toggle" href="#">
                    <span class="glyphicons glyphicons-user"></span>
                    <span class="sidebar-title">Tài khoản</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="{{ action('Admin\UserController@create') }}">
                            <span class="glyphicons glyphicons-circle_plus"></span> Tạo tài khoản </a>
                    </li>
                    <li>
                        <a href="{{ action('Admin\UserController@index') }}">
                            <span class="glyphicons glyphicons-list"></span> Quản lý tài khoản </a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-label pt20">Khóa học</li>
            <li>
                <a class="accordion-toggle" href="#">
                    <span class="glyphicons glyphicons-book"></span>
                    <span class="sidebar-title">Khóa học</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="{{ url('/admin-ant/course/create') }}">
                            <span class="glyphicons glyphicons-circle_plus"></span> Tạo khóa học </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin-ant/course') }}">
                            <span class="glyphicons glyphicons-list"></span> Quản lý khóa học </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="accordion-toggle" href="#">
                    <span class="glyphicons glyphicons-notes_2"></span>
                    <span class="sidebar-title">Danh mục</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="{{ url('/admin-ant/section/create') }}">
                            <span class="glyphicons glyphicons-circle_plus"></span> Tạo danh mục </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin-ant/section') }}">
                            <span class="glyphicons glyphicons-list"></span> Quản lý danh mục </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="accordion-toggle" href="#">
                    <span class="glyphicons glyphicons-book_open"></span>
                    <span class="sidebar-title">Bài học</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="{{ url('/admin-ant/lesson/create') }}">
                            <span class="glyphicons glyphicons-circle_plus"></span> Tạo bài học </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin-ant/lesson') }}">
                            <span class="glyphicons glyphicons-list"></span> Quản lý bài học </a>
                    </li>
                </ul>
            </li>

        </ul>
        <div class="sidebar-toggle-mini">
            <a href="#">
                <span class="fa fa-sign-out"></span>
            </a>
        </div>
    </div>
</aside>