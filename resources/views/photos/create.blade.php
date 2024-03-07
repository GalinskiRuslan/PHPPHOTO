@extends('layout.base')


@section('title', 'MyProject || Create')

@section('content')
    <h1>Create</h1>
    <x-form name="desc" action="{{ route('photos.store') }}"></x-form>
@endSection
