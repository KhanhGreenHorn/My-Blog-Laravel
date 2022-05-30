@extends('layouts.layout')

@section('content')

<section class="px-6 py-8 border rounded-xl">
    <h1 class="text-center font-bold text-xl">Edit Post</h1>

    <form method="POST" action="/posts/{{$post->id}}" enctype="multipart/form-data" onsubmit="getBody()">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                Title
            </label>

            <input class="border border-gray-400 p-2 w-full" type="text" name="title" id="title" value="{{$post->title}}" required>

            @error('title')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex mt-6">
            <div class="flex-1">
                <div class="mb-1">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="thumbnail">
                        thumbnail
                    </label>

                    <div class="flex">
                        <input onchange="changeThumbnail()" class="border border-gray-400 p-2 w-full" type="file" name="thumbnail" id="thumbnail">
                        <button type="button" onclick="clearImage()" class="bg-gray-500" id='clearbtn'>X</button>
                    </div>

                    @error('thumbnail')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                @if (isset($post->thumbnail))
                <img id="updateimg" class="rounded-xl mb-2" width="100" src="{{ asset('storage/'. $post->thumbnail) }}">
                @endif
            </div>
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="note">
                Note
            </label>

            <textarea class="border border-gray-400 p-2 w-full" name="note" id="note" required>{{$post->note}}</textarea>

            @error('note')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">
                Body
            </label>

            <input name="body" type="hidden">
            <div id="editor">{!! $post->body !!}</div>

            @error('body')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6 mt-5">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                Submit
            </button>
        </div>
    </form>
    <script>
        img = document.getElementById('updateimg');
        img.addEventListener("error", function(event) {
            if (img.style.display != 'none') {
                alert('unable to load image');
            }
        })

        var quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Write your content here...'
        });

        var form = document.querySelector('form');
        console.log("form");

        function getBody() {
            console.log("login");

            // Populate hidden form on submit
            var about = document.querySelector('input[name=body]');
            about.value = quill.root.innerHTML;

            console.log("Submitted", $(form).serialize(), $(form).serializeArray());

            // No back end to actually submit to!
            alert('Open the console to see the submit data!')
            return false;
        };

        function changeThumbnail() {
            var btn = document.getElementById('clearbtn');

            var input = document.getElementById('thumbnail');
            var img = document.getElementById('updateimg');
            img.src = window.URL.createObjectURL(input.files[0]);
            btn.style.display = 'inline';
        }

        function clearImage() {
            var input = document.getElementById('thumbnail');
            var image = document.getElementById('updateimg');
            var btn = document.getElementById('clearbtn');

            image.src = '';
            input.value = '';
            btn.style.display = 'none';
        }
    </script>

</section>

@stop