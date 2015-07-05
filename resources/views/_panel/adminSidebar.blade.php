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
                    <span class="sidebar-title">{{ trans('link.user') }}</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="{{ action('Admin\UserController@create') }}">
                            <span class="glyphicons glyphicons-circle_plus"></span> {{ trans('link.create_user') }} </a>
                    </li>
                    <li>
                        <a href="{{ action('Admin\UserController@index') }}">
                            <span class="glyphicons glyphicons-list"></span> {{ trans('link.manage_user') }} </a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-label pt20">{{ trans('link.product') }}</li>
            <li>
                <a class="accordion-toggle" href="#">
                    <span class="glyphicons glyphicons-book"></span>
                    <span class="sidebar-title">{{ trans('link.product') }}</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="{{ action('Admin\ProductController@create') }}">
                            <span class="glyphicons glyphicons-circle_plus"></span> {{ trans('link.create_product') }} </a>
                    </li>
                    <li>
                        <a href="{{ action('Admin\ProductController@index') }}">
                            <span class="glyphicons glyphicons-list"></span> {{ trans('link.manage_product') }} </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="accordion-toggle" href="#">
                    <span class="glyphicons glyphicons-book"></span>
                    <span class="sidebar-title">{{ trans('link.product_key') }}</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="{{ action('Admin\ProductKeyController@create') }}">
                            <span class="glyphicons glyphicons-circle_plus"></span> {{ trans('link.create_product_key') }} </a>
                    </li>
                    <li>
                        <a href="{{ action('Admin\ProductKeyController@index') }}">
                            <span class="glyphicons glyphicons-list"></span> {{ trans('link.manage_product_key') }} </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="accordion-toggle" href="#">
                    <span class="glyphicons glyphicons-book"></span>
                    <span class="sidebar-title">{{ trans('link.order') }}</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="{{ action('Admin\OrderController@index') }}">
                            <span class="glyphicons glyphicons-list"></span> {{ trans('link.view_orders') }} </a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-label pt20">{{ trans('link.post') }}</li>
            <li>
                <a class="accordion-toggle" href="#">
                    <span class="glyphicons glyphicons-book"></span>
                    <span class="sidebar-title">{{ trans('link.post') }}</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="{{ action('Admin\PostController@create') }}">
                            <span class="glyphicons glyphicons-circle_plus"></span> {{ trans('link.create_post') }} </a>
                    </li>
                    <li>
                        <a href="{{ action('Admin\PostController@index') }}">
                            <span class="glyphicons glyphicons-list"></span> {{ trans('link.view_posts') }} </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="accordion-toggle" href="#">
                    <span class="glyphicons glyphicons-book"></span>
                    <span class="sidebar-title">{{ trans('link.post_category') }}</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="{{ action('Admin\PostCategoryController@create') }}">
                            <span class="glyphicons glyphicons-circle_plus"></span> {{ trans('link.create_post_category') }} </a>
                    </li>
                    <li>
                        <a href="{{ action('Admin\PostCategoryController@index') }}">
                            <span class="glyphicons glyphicons-list"></span> {{ trans('link.view_post_categories') }} </a>
                    </li>
                </ul>
            </li>

<<<<<<< HEAD
            <li class="sidebar-label pt20">{{ trans('link.page') }}</li>
            <li>
                <a class="accordion-toggle" href="#">
                    <span class="glyphicons glyphicons-book"></span>
                    <span class="sidebar-title">{{ trans('link.page') }}</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="{{ action('Admin\PageController@create') }}">
                            <span class="glyphicons glyphicons-circle_plus"></span> {{ trans('link.create_page') }} </a>
                    </li>
                    <li>
                        <a href="{{ action('Admin\PageController@index') }}">
                            <span class="glyphicons glyphicons-list"></span> {{ trans('link.view_pages') }} </a>
                    </li>
                </ul>
            </li>

=======
>>>>>>> 5ebd2c5002fecd9296e71991955b38a6b8e76594
            <li class="sidebar-label pt20">{{ trans('link.support') }}</li>
            <li>
                <a class="accordion-toggle" href="#">
                    <span class="glyphicons glyphicons-book"></span>
                    <span class="sidebar-title">{{ trans('link.warranty') }}</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="{{ action('Admin\WarrantyController@index') }}">
                            <span class="glyphicons glyphicons-list"></span> {{ trans('link.view_all_warranty') }} </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="accordion-toggle" href="#">
                    <span class="glyphicons glyphicons-book"></span>
                    <span class="sidebar-title">{{ trans('link.contact') }}</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="{{ action('Admin\ContactController@index') }}">
                            <span class="glyphicons glyphicons-list"></span> {{ trans('link.view_all_contact') }} </a>
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