<div class="container">
    <div class="header">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('photos.index') }}">Photos</a>
        <a href="{{ route('news.index') }}">Новости </a>
        @auth()
            <a>
                <form method="POST" action="{{route('user.logout')}}">
                    @csrf
                    <button type="submit">Выйти</button>
                </form>
            </a>
            <a href="{{route('user.cabinet')}}"><img src="{{auth()->user()->avatar}}"/>Кабинет</a>
        @elseguest()
            <a href="{{route('user.login')}}">Войти</a>
        @endauth
    </div>
</div>

