@extends('layout.base')

@section('content')
    <h1>Photos</h1>
    <a href="{{ route('photos.create') }}"><button> Добавить</button></a>
    @if (gettype($photos) == 'array' && count($photos) > 0)
        @foreach ($photos as $photo)
            @if (gettype($photo) == 'object')
                <a href="{{ route('photos.show', $photo->title) }}">{{ $photo->title }}</a>
            @else<a href="{{ route('photos.show', $photo) }}">{{ $photo }}</a>
            @endif
        @endforeach
    @else
        <p>У вас нет фотографий</p>
    @endif

@endSection
