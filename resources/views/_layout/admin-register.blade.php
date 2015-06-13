<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>AdminDesigns</title>
    <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
    <meta name="description" content="AdminDesigns">
    <meta name="author" content="AdminDesigns">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800'>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/skin/default_skin/css/theme.css') }}">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/admin-tools/admin-forms/css/admin-forms.css') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/img/favicon.ico') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
   <![endif]-->
</head>

<body class="external-page sb-l-c sb-r-c">

    <!-- Start: Settings Scripts -->
    <script>
    var boxtest = localStorage.getItem('boxed');
    if (boxtest === 'true') {
        document.body.className += ' boxed-layout';
    }
    </script>
    <!-- End: Settings Scripts -->

    <!-- Start: Main -->
    <div id="main" class="animated fadeIn">

        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">

            @yield('content')

        </section>
        <!-- End: Content-Wrapper -->

    </div>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->

    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('vendor/jquery/jquery-1.11.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jquery/jquery_ui/jquery-ui.min.js') }}"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="{{ asset('admin/js/bootstrap/bootstrap.min.js') }}"></script>

    <!-- Page Plugins -->
    <script type="text/javascript" src="{{ asset('admin/js/pages/login/EasePack.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/pages/login/rAF.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/pages/login/TweenLite.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/pages/login/login.js') }}"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="{{ asset('admin/js/utility/utility.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/main.js') }}"></script>

    <!-- Page Javascript -->
    <script type="text/javascript">
    jQuery(document).ready(function() {
        "use strict";
        // Init Theme Core
        Core.init();

        // Init CanvasBG and pass target starting location
        CanvasBG.init({
            Loc: {
                x: window.innerWidth / 2.1,
                y: window.innerHeight / 4.2
            },
        });
    });
    </script>

    <!-- END: PAGE SCRIPTS -->

</body>

</html>
