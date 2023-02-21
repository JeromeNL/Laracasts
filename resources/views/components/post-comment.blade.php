@props(['comment'])
<article class="flex bg-gray-100 p-6 border border-gray rounded-xl space-x-4">
    <div>
        <img src="https://i.pravatar.cc/100" width="60"/>
    </div>

    <div>
        <header>
            <h3 class="font-bold">{{ $comment->author->name }}</h3>
            <p class="text-xs">
                Posted
                <time>{{ $comment->created_at }}</time>
            </p>
        </header>
        <p> {{ $comment->body }}</p>
    </div>
</article>
