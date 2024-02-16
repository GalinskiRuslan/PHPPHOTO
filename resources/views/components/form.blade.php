@props(['name' => '', 'method' => 'POST'])
<form name="{{ $name }}" action="{{ route('photos.store') }}" method="post">
    @csrf
    @method($method)
    <input id="{{ $name }}" type="hidden" name="{{ $name }}">
    <trix-editor input="desc"></trix-editor>
    <input type="file" name="photo" />
    <button type="submit">Submit</button>
</form>
@push('css')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
@endpush

@push('js')
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@endpush
