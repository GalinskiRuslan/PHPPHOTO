@extends('layout.base')


@section('content')
    <h3>Новости</h3>
    <a href="{{ route('news.create') }}"><button>Добавить новость</button></a>
    @foreach ($news as $news_one)
        <p>{{ $news_one->id }}</p>
        <p>{{ $news_one->title }}</p>
        <p>{!! $news_one->description !!}</p>
        <hr />
    @endforeach
@endsection
