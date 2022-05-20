@extends('layouts.layout')

@section('content')

<section class="px-6 py-8 border rounded-xl">
    <h1 class="text-center font-bold text-xl">Edit Post</h1>

    <form method="POST" action="/posts/{{$post->id}}">
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

            <textarea class="border border-gray-400 p-2 w-full" name="body" id="body" style="height: 257px;" required>{{$post->body}}</textarea>

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
</section>

@stop