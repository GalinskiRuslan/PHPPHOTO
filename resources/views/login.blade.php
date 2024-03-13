@extends('layout.base')


@section('title', 'Вход')

@section('content')
    <div class="login-background">
        <form class="login-form" method="POST" action="{{route('user.login')}}">
            <h3>Вход</h3>
            @csrf
            <div class="form-group">
                <label>Ваш email *</label>
                <input type="email" required name="email" placeholder="Введите ваш email адрес" id="email" value="">
                @error('email')
                <div class="error-message">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Пароль *</label>
                <input required type="password" name="password" placeholder="Введите ваш пароль" id="password" value="">
                <button id="glass" type="button" class="btn-password"><img style="width: 20px" src="/imgs/icons/free-icon-eye-158746.png" /></button>
                @error('password')
                <div class="error-message">{{$message}}</div>
                @enderror
            </div>
            <button class="btn-submit" type="submit">Войти</button>
            <a href="{{route('user.registration')}}">
                <button type="button" class="btn-submit">Регистрация</button>
            </a>
        </form>

    </div>
@endsection
@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">
@endpush
@push('js')
    <script>
        const glass =document.getElementById("glass");
        const passwordInput = document.getElementById('password');

        glass.addEventListener('click', ()=>{
            if(passwordInput.type=='password'){
                passwordInput.type = 'text'
            }
            else {
                passwordInput.type = 'password'
            }
            console.log(passwordInput.type);
        })
    </script>
@endpush
