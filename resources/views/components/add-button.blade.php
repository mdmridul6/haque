@props(['href', 'title' => 'Add New'])

<div class="ms-auto">
    <div>
        <a href="{{ $href }}" class="btn bg-primary-transparent text-primary btn-sm"
            data-bs-toggle="tooltip" title="" data-bs-placement="bottom" data-bs-original-title="{{ $title }}">
            <span>
                Add New
            </span>
        </a>
    </div>
</div>
