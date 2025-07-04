@extends('admin.layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE HEADER -->
    <div class="page-header d-sm-flex d-block align-items-center">
        <x-breadcrumbs :segments="$breadcrumbs" />
        <!-- End breadcrumb -->
        <div class="ms-auto">
            <x-back-button href="{{ route('admin.roles.index') }}" title="Back to Role List" />

        </div>
    </div>
    <!-- END PAGE HEADER -->

    <!-- ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ isset($role) ? 'Edit Role' : 'Create Role' }}</h4>
                </div>
                <div class="card-body">

                    <form method="POST"
                        action="{{ isset($role) ? route('admin.roles.update', $role) : route('admin.roles.store') }}">
                        @csrf
                        @if (isset($role))
                            @method('PUT')
                        @endif

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Role Name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $role->name ?? '') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="form-check form-switch ms-5">
                            <input class="form-check-input" type="checkbox" id="selectAll" switch>
                            <label class="form-check-label" for="selectAll">Select All Permissions</label>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                @foreach ($permissions as $group => $perms)
                                    <div class="col-md-4 col-lg-3 col-xl-3">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <strong>{{ $group }}</strong>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input group-switch" type="checkbox"
                                                        id="group-{{ \Str::slug($group) }}"
                                                        data-group="{{ \Str::slug($group) }}" switch>
                                                    <label class="form-check-label"
                                                        for="group-{{ \Str::slug($group) }}">Select
                                                        All</label>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                @foreach ($perms as $perm)
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input permission-checkbox" type="checkbox"
                                                            name="permissions[]" id="perm-{{ $perm->name }}"
                                                            value="{{ $perm->name }}"
                                                            data-group="{{ \Str::slug($group) }}"
                                                            {{ isset($rolePermissions) && in_array($perm->name, $rolePermissions) ? 'checked' : '' }}
                                                            switch>
                                                        <label class="form-check-label"
                                                            for="perm-{{ $perm->name }}">{{ Str::title(Str::replaceFirst('.', ' ', $perm->name)) }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        <div class="btn-list text-end">
                            <button type="submit" class="btn btn-success">Save Role</button>
                            <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
    <!-- END ROW -->
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAll = document.getElementById('selectAll');
            const groupSwitches = document.querySelectorAll('.group-switch');
            const permissionCheckboxes = document.querySelectorAll('.permission-checkbox');

            function updateGroupSwitch(group) {
                const checkboxes = document.querySelectorAll(`.permission-checkbox[data-group="${group}"]`);
                const checked = [...checkboxes].filter(cb => cb.checked).length;
                const groupSwitch = document.querySelector(`.group-switch[data-group="${group}"]`);
                groupSwitch.checked = checked === checkboxes.length;
            }

            function updateGlobalSwitch() {
                const all = document.querySelectorAll('.permission-checkbox').length;
                const checked = document.querySelectorAll('.permission-checkbox:checked').length;
                selectAll.checked = (all === checked);
            }

            groupSwitches.forEach(groupSwitch => {
                groupSwitch.addEventListener('change', function() {
                    const group = this.dataset.group;
                    const checkboxes = document.querySelectorAll(
                        `.permission-checkbox[data-group="${group}"]`);
                    checkboxes.forEach(cb => cb.checked = this.checked);
                    updateGlobalSwitch();
                });
            });

            permissionCheckboxes.forEach(cb => {
                cb.addEventListener('change', function() {
                    updateGroupSwitch(this.dataset.group);
                    updateGlobalSwitch();
                });
            });

            selectAll.addEventListener('change', function() {
                const checked = this.checked;
                document.querySelectorAll('.group-switch, .permission-checkbox').forEach(input => {
                    input.checked = checked;
                });
            });

            // Initial sync on load
            document.querySelectorAll('.group-switch').forEach(sw => updateGroupSwitch(sw.dataset.group));
            updateGlobalSwitch();
        });
    </script>
@endsection
