@props(['segments'])
<ol class="breadcrumb mb-sm-0 mb-3">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>

    @foreach ($segments as $segment)
        @if ($loop->last)
            <li class="breadcrumb-item active" aria-current="page">{{ $segment['title'] }}</li>
        @else
            <li class="breadcrumb-item">
                @if ($segment['url'])
                    <a href="{{ $segment['url'] }}">{{ $segment['title'] }}</a>
                @else
                    {{ $segment['title'] }}
                @endif
            </li>
        @endif
    @endforeach
</ol>
