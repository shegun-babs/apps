
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Welcome to my Page')</title>
    <meta name="description" content="Personal website of shegun babs">
    <meta name="keywords" content="">
    <meta charset="utf-8">
    <meta name="author" content="Shegun Babs">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

    <!-- CSS -->
    <link rel="stylesheet" href="/mosaic/css/bootstrap.min.css">
    <link rel="stylesheet" href="/mosaic/css/style.css">
    <link rel="stylesheet" href="/mosaic/css/style-responsive.css">
    <link rel="stylesheet" href="/mosaic/css/animate.min.css">
    <link rel="stylesheet" href="/mosaic/css/vertical-rhythm.min.css">
    <link rel="stylesheet" href="/mosaic/css/font-awesome.min.css">
    {{--<link rel="stylesheet" href="css/owl.carousel.css">--}}
    {{--<link rel="stylesheet" href="css/magnific-popup.css">--}}


</head>
<body class="appear-animate">

<!-- Page Loader -->
<div class="page-loader">
    <div class="loader">Loading...</div>
</div>
<!-- End Page Loader -->

<!-- Menu Button -->
<a href="#" class="sp-button"><span></span>Menu</a>
<!-- End Menu Button -->

@include('layouts.frontend.partials.sidebar')

<div class="page side-panel-is-left" id="top">
@yield('content')

    <!-- Foter -->
    @include('layouts.frontend.partials.footer')
    <!-- End Foter -->

</div>
<!-- End Page Wrap -->


<!-- JS -->
<script type="text/javascript" src="/mosaic/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="/mosaic/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="/mosaic/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/mosaic/js/SmoothScroll.js"></script>
<script type="text/javascript" src="/mosaic/js/jquery.scrollTo.min.js"></script>
<script type="text/javascript" src="/mosaic/js/jquery.viewport.mini.js"></script>
<script type="text/javascript" src="/mosaic/js/jquery.countTo.js"></script>
<script type="text/javascript" src="/mosaic/js/jquery.appear.js"></script>
<script type="text/javascript" src="/mosaic/js/jquery.sticky.js"></script>
<script type="text/javascript" src="/mosaic/js/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="/mosaic/js/jquery.fitvids.js"></script>
<script type="text/javascript" src="/mosaic/js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="/mosaic/js/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript" src="/mosaic/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="/mosaic/js/wow.min.js"></script>
<script type="text/javascript" src="/mosaic/js/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="/mosaic/js/jquery.simple-text-rotator.min.js"></script>
<script type="text/javascript" src="/mosaic/js/all.js"></script>
<script type="text/javascript" src="/mosaic/js/tiltfx.js"></script>
<!--[if lt IE 10]><script type="text/javascript" src="/mosaic/js/placeholder.js"></script><![endif]-->

</body>
</html>
