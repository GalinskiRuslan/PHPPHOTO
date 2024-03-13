@extends('layout.base')


@section('title', 'Вход')

@section('content')
    <div class="login-background">
        <form class="login-form" method="POST" action="{{route('user.registration')}}">
            <h3>Регистрация</h3>
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
                <button id="glass" type="button" class="btn-password"><img style="width: 20px"
                                                                           src="/imgs/icons/free-icon-eye-158746.png"/>
                </button>
                @error('password')
                <div class="error-message">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Имя пользователя *</label>
                <input required type="name" name="name" placeholder="Введите ваше имя" id="name" value="">
                @error('name')
                <div class="error-message">{{$message}}</div>
                @enderror
            </div>
            <button class="btn-submit" type="submit">Регистрация</button>
            <a href="{{route('user.login')}}">
                <button type="button" class="btn-submit">Войти</button>
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
