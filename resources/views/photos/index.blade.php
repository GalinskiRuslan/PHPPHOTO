@extends('layout.base')

@section('content')
    <h1>Photos</h1>
    @if (session('success'))
        <div style="font-size: 32px; color:green">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('photos.create') }}">
        <button> Добавить</button>
    </a>
    @if (gettype($files) == 'array' && count($files) > 0)
        @foreach ($files as $file)
            @if (gettype($file) == 'object')
                <p><a href="{{ route('photos.show', $file) }}">
                        <img src="/storage/{{ $file }}" style="max-width: 600px"/></a></p>
            @else
                <p><a href="{{ route('photos.show', substr($file, 7)) }}">
                        <img src="/storage/{{ $file }}" style="max-width: 600px"/>
                    </a>
                </p>
            @endif
        @endforeach
    @else
        <p>У вас нет фотографий</p>
    @endif

@endSection
