@props(['comment','post'])
<article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4">

    @if ($comment->author->id == auth()->user()->id)

    <div class="flex-shrink-0">
        <img src="/images/lary-avatar.svg" alt="Lary avatar" width="60" class="rounded-xl">
    </div>

    <div class="w-10/12">

        <header class="mb-4">
            <h3 class="font-bold">{{$comment->author->name}}</h3>
            <p class="text-xs">Post<time> {{$comment->created_at->diffForHumans()}} </time> </p>
        </header>

        <p> {{$comment->body}} </p>
    </div>

    <form action="/posts/{{$post->title}}/comments/{{$comment->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button type='Submit'>X</button>
    </form>

    @else
    <div class="flex-shrink-0">
        <img src="/images/lary-avatar.svg" alt="Lary avatar" width="60" class="rounded-xl">
    </div>

    <div class="w-10/12">

        <header class="mb-4">
            <h3 class="font-bold">{{$comment->author->name}}</h3>
            <p class="text-xs">Post<time> {{$comment->created_at->diffForHumans()}} </time> </p>
        </header>

        <p> {{$comment->body}} </p>

    </div>
    @endif
</article>