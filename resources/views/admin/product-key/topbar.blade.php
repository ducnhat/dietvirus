<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    @include('_panel.adminLeftTopbar')
    <div class="topbar-right">
        <a href="{{ action('Admin\ProductController@create') }}" class="btn btn-default btn-sm light fw600 ml10"><span class="fa fa-plus pr5"></span> {{ trans('link.create_product') }}</a>
    </div>
</header>
<!-- End: Topbar -->