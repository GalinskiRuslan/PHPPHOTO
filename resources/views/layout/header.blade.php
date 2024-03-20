<div class="container">
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('photos.index') }}">Photos</a>
    <a href="{{ route('photoView') }}">View Photos</a>
    <a href="{{ route('news.index') }}">Новости </a>
    @if(Auth::check())
        <a href="{{route('user.logout')}}">Выйти</a>
        <a href="{{route('user.cabinet')}}">Кабинет</a>
    @else
        <a href="{{route('user.login')}}">Войти</a>
    @endif
</div>

