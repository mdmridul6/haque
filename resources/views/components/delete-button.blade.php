@props(['href', 'title' => 'Delete'])



<form action="{{ $href }}" id="delete-form" method="post">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-sm btn-danger badge" data-bs-toggle="tooltip" data-bs-placement="auto"
        onclick="deleteAction()" title="{{ $title }}">
        Delete
    </button>
</form>
