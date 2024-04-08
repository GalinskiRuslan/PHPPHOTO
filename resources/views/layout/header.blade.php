<div class="container">
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('photos.index') }}">Photos</a>
    <a href="{{ route('news.index') }}">Новости </a>
    @auth()
        <a href="{{route('user.logout')}}">Выйти</a>
        <a href="{{route('user.cabinet')}}"><img src="{{auth()->user()->avatar}}"/>Кабинет</a>
    @elseguest()
        <a href="{{route('user.login')}}">Войти</a>
    @endauth
</div>

