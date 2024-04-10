@extends('layout.base')


@section('забыли пароль', 'MyProject || Forgot')

@section('content')
    <h1>CodeArt</h1>
    <p>Забыли пароль? отправьте сброс пароля на вашк почту</p>
    <form action="{{route('user.resetPassword')}}" method="POST">
        @if(session("status"))
            {{session('status')}}
        @endif
        @csrf
        <input type="email" id="email" value="{{old('email')}}" name="email">
        @error('email')
        <div>{{$message}}</div>
        @enderror
        <button type="submit">Отправить</button>
    </form>
@endSection
