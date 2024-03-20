@extends('layout.base')


@section('title', 'Личный кабинет')

@section('content')
    <div class="login-background">
        <p>id:{{$user->id}}</p>
        <p>Name: {{$user->name}}</p>
        CABINET
    </div>
@endsection
@push('css')

@endpush
@push('js')

@endpush
