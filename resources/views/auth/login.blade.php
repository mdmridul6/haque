@extends('auth.layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('build/assets/plugins/toastr/toastr.min.css') }}">
@endsection

@section('content')
    <div class="page-content">
        <div class="container text-center text-dark">
            <div class="row">
                <div class="col-lg-4 d-block mx-auto">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center mb-2">
                                        <a class="header-brand1" href="{{ url('index') }}">
                                            <img src="{{ asset('build/assets/images/brand/logo.png') }}"
                                                class="header-brand-img main-logo" alt="Sparic logo">
                                            <img src="{{ asset('build/assets/images/brand/logo-light.png') }}"
                                                class="header-brand-img darklogo" alt="Sparic logo">
                                        </a>
                                    </div>
                                    <h3>Login</h3>
                                    <p class="text-muted">Sign In to your account</p>

                                    <form action="{{ route('login') }}" method="post">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <span class="input-group-addon bg-white"><i
                                                    class="fa fa-user text-dark"></i></span>
                                            <input type="text" class="form-control" name="email" placeholder="Username">
                                        </div>
                                        <div class="input-group mb-4">
                                            <span class="input-group-addon bg-white"><i
                                                    class="fa fa-unlock-alt text-dark"></i></span>
                                            <input type="password" class="form-control" name="password" placeholder="Password">
                                        </div>
                                        <div class="row">
                                            <div>
                                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                                            </div>
                                        </div>

                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('build/assets/plugins/toastr/toastr.min.js') }}"></script>
@endsection
