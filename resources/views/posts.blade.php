@extends ('components.layout')

@section('banner')
    <h1>My blog Title</h1>
@endsection


@section('content')
    @foreach ($posts as $post)

        <article>
            <h1>
            <a href="/posts/{{ $post->slug }}">
                {!! $post->title !!}
            </a>
            </h1>


                <a href="#"> {{ $post->category->name }}</a>


            <p>
                 {!! $post->description  !!}
            </p>

        </article>

    @endforeach
@endsection
