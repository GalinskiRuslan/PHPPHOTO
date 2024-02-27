@props(['name' => '', 'method' => 'POST'])


@if (session('success'))
    <div>
        {{ session('success') }}
    </div>
    <img style="max-width: 160px" src="{{ session('path') }}" />
@endif




<form name="{{ $name }}" action="{{ route('photos.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method($method)
    <input id="{{ $name }}" type="hidden" name="{{ $name }}">
    <trix-editor input="desc"></trix-editor>
    <input type="file" name="image" id="image" />
    <button type="submit">Submit</button>
</form>
@push('css')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
@endpush

@push('js')
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@endpush
