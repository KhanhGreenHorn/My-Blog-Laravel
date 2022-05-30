@extends('layouts.layout')
@section('content')
<section>
    <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
        <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
            @if (isset($post->thumbnail))
            <img src="{{ asset('storage/'. $post->thumbnail) }}" alt="Blog Post illustration" class="rounded-xl">
            @else
            <img src="/images/illustration-1.png" alt="Blog Post illustration" class="rounded-xl">
            @endif

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

                <div class="flex">
                    <x-categorybutton :post="$post" class="mt-2 mr-2" />
                    @if (auth()->user()->id == $post->author->id || auth()->user()->email == 'puchapu10@gmail.com')
                    <x-dropdown>
                        <x-slot name='trigger'>
                            <button class="text-xs font-bold uppercase text-left flex">
                                <svg class="transform -rotate-90 pointer-events-none" width="22" height="22" viewBox="0 0 22 22">
                                    <g fill="none" fill-rule="evenodd">
                                        <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z"></path>
                                        <path fill="#222" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                                    </g>
                                </svg>
                            </button>
                        </x-slot>
                        @if(auth()->user()->id == $post->author->id)
                        <x-dropdownitem href="#" x-data="{}" @click.prevent="document.querySelector('#editpost').submit()">Edit post</x-dropdownitem>
                        <form id="editpost" method="POST" action="/posts/{{$post->id}}/edit" class="hidden">
                            @csrf
                            @method('GET')
                        </form>
                        @endif
                        <x-dropdownitem href="#" x-data="{}" @click.prevent="document.querySelector('#deletepost').submit()" class="text-red-500">Delete post</x-dropdownitem>
                        <form id="deletepost" method="POST" action="/posts/{{$post->id}}" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>

                    </x-dropdown>
                    @endif
                </div>
            </div>

            <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                {{ $post->title }}
            </h1>

            <div class="space-y-4 lg:text-lg leading-loose" style="overflow-wrap:break-word;">
                {!! $post->body !!}
            </div>
        </div>

        <section class="col-span-8 col-start-5 mt-10 space-y-6">
            @auth
            <form method="POST" action="/comments" class="border border-gray-200 p-6 rounded-xl" enctype="multipart/form-data">
                @csrf
                <header class="flex items-center">
                    <img src="/images/lary-avatar.svg" width="40" height="40" class="rounded-full">

                    <h2 class="ml-4">Want to participate?</h2>
                </header>

                <div class="mt-2">
                    <input onchange="change_cmt_img()" name="image" type="file" id='comment_img_input' hidden />
                    <label for="comment_img_input" class="p-1 bg-green-400 text-sm rounded-xl shadow-lg hover:bg-green-600 cursor-pointer ">+image</label>
                </div>

                <div class="mt-3">
                    <textarea name="body" class="w-full text-sm focus-outline-none focus:ring" rows="5" placeholder="Have things to say?..."></textarea>
                </div>

                <input type="hidden" name="post_id" value="{{$post->id}}">

                <div>
                    <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Post</button>
                </div>

                <img id="cmt_img" width="177" height="100" class="p-1 rounded-xl" hidden>
            </form>
            <x-modalimage />
            @else
            <a href="/register"><u>Register</u></a> or <a href="/login"><u>login</u></a> to leave a comment
            @endauth

            @foreach ($post->comments as $comment)
            <x-postcomment :comment="$comment" :post="$post" />
            @endforeach
        </section>
    </article>
    <script>
        function change_cmt_img() {
            var input = document.getElementById('comment_img_input');
            var img = document.getElementById('cmt_img');
            img.src = window.URL.createObjectURL(input.files[0]);
            img.style.display = 'inline';
        }
    </script>
</section>
@endsection