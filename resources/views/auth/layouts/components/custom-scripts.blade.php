<!-- JQUERY MIN JS -->
<script src="{{ asset('build/assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('build/assets/plugins/sticky/sticky.js') }}"></script>

<!-- BOOTSTRAP5 BUNDLE JS -->
<script src="{{ asset('build/assets/plugins/bootstrap/popper.min.js') }}"></script>
<script src="{{ asset('build/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- MOMENT JS -->
<script src="{{ asset('build/assets/plugins/moment/moment.min.js') }}"></script>

<!-- NEWS TICKER JS -->
<script src="{{ asset('build/assets/plugins/newsticker/breaking-news-ticker.min.js') }}"></script>
@yield('scripts')

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr.error(@js($error))
        </script>
    @endforeach
@endif


@stack('scripts')
