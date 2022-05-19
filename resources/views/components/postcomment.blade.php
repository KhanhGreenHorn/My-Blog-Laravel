@props(['comment','post'])
<article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4">

    
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

    @if (auth()->user()->id == $post->author->id || auth()->user()->name == 'khanh')
        <x-dropdown class="h-10">
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
            @if (auth()->user()->id == $comment->author->id) 
            <x-dropdownitem href="#" x-data="{}" @click.prevent="document.querySelector('#editcomment').submit()">Edit comment</x-dropdownitem>
            <form id="editcomment" method="POST" action="/comments/{{$comment->id}}/edit" class="hidden">
                @csrf
                @method('GET')
            </form>
            @endif
            <x-dropdownitem href="#" x-data="{}" @click.prevent="document.querySelector('#deletecomment').submit()" class="text-red-500">Delete comment</x-dropdownitem>
            <form id="deletecomment" method="POST" action="/comments/{{$comment->id}}" class="hidden">
                @csrf
                @method('DELETE')
            </form>

        </x-dropdown>
    @endif
</article>