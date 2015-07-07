<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>AdminDesigns</title>
    <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
    <meta name="description" content="AdminDesigns">
    <meta name="author" content="AdminDesigns">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font CSS (Via CDN) -->
    {{--<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700'>--}}
    {{--<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">--}}

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/admin-tools/admin-forms/css/admin-forms.css') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/skin/default_skin/css/theme.css') }}">

    <!-- Admin Panels CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/admin-tools/admin-plugins/admin-panels/adminpanels.css') }}">

    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/datatable.css') }}">

    <!-- Summernote CSS  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/editors/summernote/summernote.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/editors/summernote/summernote-bs3.css') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/img/favicon.ico') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>

<body class="dashboard-page sb-l-o sb-r-c">

    <!-- include('_panel.adminTheme') -->

<!-- Start: Main -->
<div id="main">

    @include('_panel.adminHeader')

    @include('_panel.adminSidebar')

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

        @yield('content')

    </section>
    <!-- End: Content-Wrapper -->

    @include('_panel.adminRightSidebar')

</div>
<!-- End: Main -->

    @include('_panel.adminJS')
    @yield('script')

</body>

</html>
