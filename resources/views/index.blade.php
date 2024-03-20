@extends('layout.base')


@section('title', 'MyProject || Main')

@section('content')
    <div class="container">
        <h1>CodeArt</h1>
        {{--        @dd($products)--}}
        @foreach($products as $product)
            <div class="item-card">
                <p class="item-title">{{$product->id}}. {{$product->title}}</p>
                <img alt="item" src="/{{$product->thumbnail}}"/>
                <p>Price: {{$product->price}} ₭ ₮ ₸</p>
            </div>
        @endforeach

    </div>
@endSection
