@extends('layouts.layout')

@section('content')

<section class="px-6 py-8 border rounded-xl">
    <h1 class="text-center font-bold text-xl">Edit Comment</h1>

    <form method="POST" action="/comments/{{$comment->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">
                Body
            </label>

            <textarea class="border border-gray-400 p-2 w-full" name="body" id="body" style="height: 257px;" required>{{$comment->body}}</textarea>

            @error('body')
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
                        <input onchange="changeThumbnail()" class="border border-gray-400 p-2 w-full" type="file" name="image" id="thumbnail">
                        <button type="button" onclick="clearImage()" class="bg-gray-500" id='clearbtn'>X</button>
                    </div>

                    @error('thumbnail')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                @if (isset($comment->image))
                <img id="updateimg" class="rounded-xl mb-2" width="150" height="84" src="{{ asset('storage/'. $comment->image) }}">
                @endif
            </div>
        </div>

        <div class="mb-6 mt-5">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                Submit
            </button>
        </div>
    </form>
    <script>
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