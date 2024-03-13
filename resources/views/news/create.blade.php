@extends('layout.base')



@section('content')
    <h3>Добавление новости</h3>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form name="desc" action="{{ route('news.store') }}" method="POST">
        @csrf
        @method('POST')
        <input type="text" name="title" placeholder="Заголовок" />
        <p>Описание новости</p>
        <trix-editor input="desc"></trix-editor>
        <input id="desc" type="hidden" name="description">
        <button type="submit">Сохранить</button>
    </form>
@endsection
@push('css')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
@endpush

@push('js')
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@endpush
