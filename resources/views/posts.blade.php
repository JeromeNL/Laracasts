@extends ('components.layout')

@section('banner')
    <h1>My blog Title</h1>
@endsection


@section('content')
    @foreach ($posts as $post)

        <article>
            <a href="/posts/{{ $post->slug }}">
                {!! $post->title !!}
            </a>
            {!! $post->description  !!}
        </article>

    @endforeach
@endsection
