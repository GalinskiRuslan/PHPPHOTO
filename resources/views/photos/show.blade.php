@extends('layout.base')


@section('content')
    <x-card>
        <div>
            <h1>Photo</h1> <button>Редактировать фото</button>
        </div>
        <p>{{ $photo->title }}</p>
        <p>{{ $photo->desc }}</p>
    </x-card>
@endSection
