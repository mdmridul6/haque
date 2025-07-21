<!-- ========== Start Stylesheet ========== -->
<link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('frontend/assets/css/bootstrap-spacing-classes.css') }}" rel="stylesheet" />

<link href="{{ asset('frontend/assets/css/font-awesome.min.css') }}" rel="stylesheet" />
<link href="{{ asset('frontend/assets/css/bootstrap-icons.min.css') }}" rel="stylesheet" />
<link href="{{ asset('frontend/assets/css/flaticon-set.css') }}" rel="stylesheet" />
<link href="{{ asset('frontend/assets/css/magnific-popup.css') }}" rel="stylesheet" />
<link href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}" rel="stylesheet" />
<link href="{{ asset('frontend/assets/css/owl.theme.default.min.css') }}" rel="stylesheet" />
<link href="{{ asset('frontend/assets/css/animate.css') }}" rel="stylesheet" />
<link href="{{ asset('frontend/assets/css/bootsnav.css') }}" rel="stylesheet" />
<link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/responsive.css') }}" rel="stylesheet" />
<!-- ========== End Stylesheet ========== -->

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="assets/js/html5/html5shiv.min.js"></script>
      <script src="assets/js/html5/respond.min.js"></script>
    <![endif]-->

<!-- ========== Google Fonts ========== -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">

<style>
    :root {
        --main-bg-color:{{ $content->site_color ?? '#4c6ef3' }};

    }
</style>


@stack('style')
