@section('content')
    <!-- Start Breadcrumb
                ============================================= -->
    <div class="breadcrumb-area shadow dark bg-fixed text-center padding-xl text-light"
        style="background-image: url({{ asset($content?->image) }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Privacy Policy</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Privacy Policy</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Blog
                ============================================= -->
    <div id="blog" class="blog-area bg-gray full-width single default-padding ">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </div>
@endsection
