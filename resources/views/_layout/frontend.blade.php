<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>AdminDesigns</title>
    <meta name="keywords" content="Phần mềm diệt virus" />
    <meta name="description" content="Đức Nhật">
    <meta name="author" content="Đức Nhật">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-theme.min.css') }}">

    <!-- Layout CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/main.css') }}">

</head>

<body class="dashboard-page sb-l-o sb-r-c">

<div class="container">

    <div id="header">

        <div class="row">
            <div id="logo" class="col-md-4">
                <img class="img-responsive" src="http://placehold.it/150x150" alt="Logo" />
            </div>

            <div id="menutop" class="col-md-4 col-md-offset-4 text-right">
                <a href="#" title="">Giỏ hàng</a> |
                <a href="#" title="">Đăng nhập</a>
            </div>
        </div>

        <div id="mainmenu" class="row">
            <div class="col-md-12">
                <a href="#" title="">Trang chủ</a> |
                <a href="#" title="">Bảo hành</a> |
                <a href="#" title="">Hỗ trợ</a> |
                <a href="#" title="">Liên hệ</a>
            </div>
        </div>

    </div>

    <div id="content">

        <div class="row">

            <div id="product" class="col-md-4">
                <img class="img-responsive" src="http://placehold.it/300x300" alt="Logo" />
                <h4><a href="#">Kaspersky Internet Security</a></h4>
                <h4>120.000đ</h4>
            </div>

            <div id="product" class="col-md-4">
                <img class="img-responsive" src="http://placehold.it/300x300" alt="Logo" />
                <h4>Kaspersky Internet Security</h4>
                <h4>120.000đ</h4>
            </div>

            <div id="product" class="col-md-4">
                <img class="img-responsive" src="http://placehold.it/300x300" alt="Logo" />
                <h4>Kaspersky Internet Security</h4>
                <h4>120.000đ</h4>
            </div>

        </div>

    </div>

</div>
@include('_panel.frontendJS')
@yield('script')

</body>

</html>
