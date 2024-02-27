@extends('layout.base')

@section('content')
    <div style="text-align: center">
        @foreach ($files as $file)
            <p>{{ $file }}</p>
            <img src="/storage/{{ $file }}" style="max-width: 600px" />
        @endforeach
    </div>
@endSection
