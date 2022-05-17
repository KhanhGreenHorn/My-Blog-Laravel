@extends('layouts.layout')
@section('content')
<section>
    <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
        <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
            <img src="/images/illustration-1.png" alt="" class="rounded-xl">

            <p class="mt-4 block text-gray-400 text-xs">
                Published <time>{{ $post->created_at->diffForHumans() }}</time>
            </p>

            <div class="flex items-center lg:justify-center text-sm mt-4">
                <img src="/images/lary-avatar.svg" alt="Lary avatar">
                <div class="ml-3 text-left">
                    <a href="/?author={{ $post->author->name }}">
                        <h5 class="font-bold">{{ $post->author->name }}</h5>
                    </a>
                    <h6>Mascot at Laracasts</h6>
                </div>
            </div>
        </div>

        <div class="col-span-8">
            <div class="hidden lg:flex justify-between mb-6">
                <a href="/" class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                    <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                        <g fill="none" fill-rule="evenodd">
                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                            </path>
                            <path class="fill-current" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                            </path>
                        </g>
                    </svg>

                    Back to Posts
                </a>

                <x-categorybutton :post="$post" />
            </div>

            <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                {{ $post->title }}
            </h1>

            <div class="space-y-4 lg:text-lg leading-loose">
                {{ $post->body }}
            </div>
        </div>

        <section class="col-span-8 col-start-5 mt-10 space-y-6">
            @auth
            <form method="POST" action="/posts/{{ $post->title }}/comments" class="border border-gray-200 p-6 rounded-xl">
                @csrf
                <header class="flex items-center">
                    <img src="/images/lary-avatar.svg" width="40" height="40" class="rounded-full">

                    <h2 class="ml-4">Want to participate?</h2>
                </header>

                <div class="mt-6">
                    <textarea name="body" class="w-full text-sm focus-outline-none focus:ring" rows="5" placeholder="Have things to say?..."></textarea>
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Post</button>
                </div>
            </form>
            @else
            <a href="/register"><u>Register</u></a> or <a href="/login"><u>login</u></a> to leave a comment
            @endauth

            @foreach ($post->comments as $comment)
            <x-postcomment :comment="$comment" :post="$post" />
            @endforeach

        </section>

    </article>

</section>
@endsection