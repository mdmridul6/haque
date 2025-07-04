<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!-- TITLE -->
    <title>{{ $pageTitle }}</title>

    <!-- FAVICON -->
    <link rel="icon" href="{{ asset('build/assets/images/brand/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('build/assets/images/brand/favicon.ico') }}" type="image/x-icon">

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('build/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- APP SCSS -->
    @vite(['resources/sass/app.scss'])

    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-e84fc687.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/app-342bd17d.css') }}"> --}}


    <!-- ICONS CSS -->
    <link href="{{ asset('build/assets/iconfonts/icons.css') }}" rel="stylesheet">

    <!-- ANIMATE CSS -->
    <link href="{{ asset('build/assets/iconfonts/animated.css') }}" rel="stylesheet">

    <!-- APP CSS -->


    @vite(['resources/css/app.css'])

    @yield('styles')
    @stack('styles')

</head>

<body class="app sidebar-mini ltr">

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- MAIN-HEADER -->
            @include('admin.layouts.components.main-header')

            <!-- END MAIN-HEADER -->

            <!-- MAIN-SIDEBAR -->
            @include('admin.layouts.components.main-sidebar')

            <!-- END MAIN-SIDEBAR -->

            <!-- MAIN-CONTENT -->
            <div class="main-content app-content">
                <div class="side-app">
                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- END MAIN-CONTENT -->
        </div>



        <!-- MAIN-FOOTER -->
        @include('admin.layouts.components.main-footer')

        <!-- END MAIN-FOOTER -->

    </div>
    <!-- END PAGE-->

    <!-- SCRIPTS -->

    <!-- JQUERY MIN JS -->
    <script src="{{ asset('build/assets/plugins/jquery/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP5 BUNDLE JS -->
    <script src="{{ asset('build/assets/plugins/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- PERFECT-SCROLLBAR JS  -->
    {{-- <script src="{{asset('build/assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script> --}}
    {{-- <script src="{{asset('build/assets/plugins/p-scroll/pscroll.js')}}"></script> --}}

    <!-- SIDEMENU JS -->
    <script src="{{ asset('build/assets/plugins/sidemenu/sidemenu.js') }}"></script>


    <script src="{{ asset('build/assets/plugins/notify/js/notifIt.js') }}"></script>
    @vite('resources/js/app.js')
    {{-- <script src="{{ asset('build/assets/app-ebe12b83.js') }}"></script> --}}
    @yield('scripts')
    @stack('scripts')
    <x-toastr-message />

    @if (request()->routeIs('*.*.index'))
        <script src="{{ asset('build/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('build/assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
        <script src="{{ asset('build/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('build/assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>

        <script src="{{ asset('build/assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>

        <script>
            $(function() {

                $('#responsive-datatable').DataTable({
                    language: {
                        searchPlaceholder: 'Search...',
                        scrollX: "100%",
                        sSearch: '',
                    }
                });
            });
        </script>
        <script>
            function deleteAction() {

                let deleteForm = event.target.closest('#delete-form');

                $('body').removeClass('timer-alert');
                swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover data",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "cancel !",
                        closeOnConfirm: true,
                        closeOnCancel: true
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            deleteForm.submit();
                        }
                    });
            }
        </script>
        <!-- END SCRIPTS -->
    @endif
    <!-- APP JS -->

</body>

</html>
