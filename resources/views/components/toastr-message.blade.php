    <script src="{{ asset('build/assets/plugins/notify/js/jquery.growl.js') }}"></script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                $.growl.error({
                    message: @js($error)
                });
                // toastr.error(@js($error))
            </script>
        @endforeach
    @endif

    @if (request()->session()->has('toastr::messages'))


        @if (request()->session()->get('toastr::messages')[0]['type'] == 'error')
            <script>
                $.growl.error({
                    title: @js(request()->session()->get('toastr::messages')[0]['title']) ?? @js(ucfirst(request()->session()->get('toastr::messages')[0]['type'])),
                    message: @js(request()->session()->get('toastr::messages')[0]['message'])
                });
            </script>
        @endif
        @if (request()->session()->get('toastr::messages')[0]['type'] == 'success')
            <script>
                $.growl.notice({
                    title: @js(request()->session()->get('toastr::messages')[0]['title']) ?? @js(ucfirst(request()->session()->get('toastr::messages')[0]['type'])),
                    message: @js(request()->session()->get('toastr::messages')[0]['message'])
                });
            </script>
        @endif
        @if (request()->session()->get('toastr::messages')[0]['type'] == 'warning')
            <script>
                $.growl.warning({
                    title: @js(request()->session()->get('toastr::messages')[0]['title']) ?? @js(ucfirst(request()->session()->get('toastr::messages')[0]['type'])),
                    message: @js(request()->session()->get('toastr::messages')[0]['message'])
                });
            </script>
        @endif
        @if (request()->session()->get('toastr::messages')[0]['type'] == 'info')
            <script>
                $.growl({
                    title:@js(request()->session()->get('toastr::messages')[0]['message']),
                    message: ""
                });
            </script>
        @endif

    @endif
