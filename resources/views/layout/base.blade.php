<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('title', 'MyProject')</title>
</head>

<body>
<div class="page">
    <header>@include('layout.header')</header>
    <main>
        <div id="container" class="container">@yield('content')</div>
    </main>
    <footer>@include('layout.footer')</footer>
</div>
</body>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@stack('js')
@stack('css')
</html>
