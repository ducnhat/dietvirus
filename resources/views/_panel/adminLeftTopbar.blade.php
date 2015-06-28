<div class="topbar-left">
    <ul class="nav nav-list nav-list-topbar pull-left">
        <li class="active">
            <a href="{{ url('/admin-ant') }}">Trang chủ</a>
        </li>
        <li>
            <a href="{{ action('Admin\UserController@index') }}">{{ trans('link.user') }}</a>
        </li>
        <li>
            <a href="{{ action('Admin\ProductController@index') }}">{{ trans('link.product') }}</a>
        </li>
        <li>
            <a href="{{ action('Admin\ProductKeyController@index') }}">{{ trans('link.product_key') }}</a>
        </li>
<li>
            <a href="{{ action('Admin\OrderController@index') }}">{{ trans('link.order') }}</a>
        </li>

    </ul>
</div>