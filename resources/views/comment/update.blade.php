@extends('layouts.layout')

@section('content')

<section class="px-6 py-8 border rounded-xl" >
    <h1 class="text-center font-bold text-xl">Edit Comment</h1>

    <form method="POST" action="/comments/{{$comment->id}}">
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

        <div class="mb-6 mt-5">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                Submit
            </button>
        </div>
    </form>
</section>

@stop