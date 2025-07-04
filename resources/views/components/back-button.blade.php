@props(['href', 'title' => 'Go Back'])

<div class="ms-auto">
    <div>
        <a href="{{ $href }}"
           class="btn bg-primary-transparent text-primary btn-sm"
           data-bs-toggle="tooltip"
           data-bs-placement="bottom"
           title="{{ $title }}">
            <span><i class="fa fa-arrow-left"></i></span>
        </a>
    </div>
</div>
