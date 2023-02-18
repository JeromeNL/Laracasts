@extends('components.layout')

@section('banner')
@endsection

@section('content')

    <article>
        <h1>{{$post->title}}</h1>

        <p>
            By <a href="#">{{ $post->user->name }}</a> - <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        </p>

        <div>
            {{ $post->description }}
        </div>
    </article>

    <a href="/">Go Back</a>

@endsection
