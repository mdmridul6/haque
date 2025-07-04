@extends('admin.layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE HEADER -->
    <div class="page-header d-sm-flex d-block">
        <x-breadcrumbs :segments="$breadcrumbs" />
        <!-- End breadcrumb -->
        <div class="ms-auto">
            <x-back-button href="{{ route('admin.work-process.index') }}" />
        </div>
    </div>
    <!-- END PAGE HEADER -->

    <!-- ROW -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>User Edit</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.user.update', ['user' => $user->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <x-file-uploder name="image" label="Profile Image" image_url="{{ asset($user->image) }}" />
                        </div>
                        <div class="form-group">
                            <x-text-input label="First Name" name="first_name" placeholder="Enter first name"
                                required="true" value="{{ $user->first_name }}" />
                        </div>
                        <div class="form-group">
                            <x-text-input label="Last Name" name="last_name" placeholder="Enter last name" required="true"
                                value="{{ $user->last_name }}" />
                        </div>
                        <div class="form-group">
                            <x-text-input label="Email" name="email" value="{{ $user->email }}"
                                placeholder="Enter your email" required="true" />
                        </div>


                        <div class="form-group">
                            <x-select-option name="role" label="User Role" :values="$user->getRoleNames()->toArray()" :options="$roles"
                                valueField="name" titleField="name" :multiple="false" />
                        </div>




                        <div class="btn-list text-end">
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <h4>Password Reset</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.user.password', ['user' => $user->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <div class="input-group">
                                <x-text-input name="current_password" type="password" placeholder="Current Password"
                                    :required="true" :autocomplete="false" />
                                <button class="btn btn-primary" id="passwordShowHide" type="button"
                                    title="Show and hide password"><i class="fa fa-eye"></i></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <div class="input-group">
                                <x-text-input name="password" type="password" placeholder="Enter your new password"
                                    :required="true" :autocomplete="false" />
                                <button class="btn btn-primary" id="passwordShowHide" type="button"
                                    title="Show and hide password"><i class="fa fa-eye"></i></button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">Conform Passwords</label>
                            <div class="input-group">
                                <x-text-input name="password_confirmation" type="password"
                                    placeholder="Conform your password" :required="true" :autocomplete="false" />
                                <button class="btn btn-primary" id="passwordShowHide" type="button"
                                    title="Show and hide password"><i class="fa fa-eye"></i></button>
                            </div>
                        </div>

                        <div class="btn-list text-end">
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- END ROW -->
@endsection

@push('scripts')
    <script>
        $(document).on('click', '#passwordShowHide', function() {
            const input = $(this).prev('input'); // or use a more direct selector if needed

            const type = input.attr('type') === 'password' ? 'text' : 'password';
            input.attr('type', type);

            // Optional: Toggle the eye icon
            $(this).find('i').toggleClass('fa-eye fa-eye-slash');
        });
    </script>
@endpush
