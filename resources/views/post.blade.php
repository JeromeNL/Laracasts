@extends('components.layout')


@section('content')

    <article>
        <h1>{{$post->title}}</h1>
        <div>
            {!! $post->description !!}
        </div>
    </article>

    <a href="/">Go Back</a>

@endsection
