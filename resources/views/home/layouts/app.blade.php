<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dostart - Startup Landing Page">

    <!-- ========== Page Title ========== -->
    <title>Dostart - Startup Landing Page</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    @include('home.layouts.partials.style')

</head>

<body>

    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->



    @include('home.layouts.partials.navbar')
    @yield('content')


    @include('home.layouts.partials.footer')

    @include('home.layouts.partials.scripts')
</body>

</html>
