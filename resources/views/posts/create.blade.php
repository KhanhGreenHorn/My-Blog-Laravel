@extends('layouts.layout')

@section('content')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>

<section class="px-6 py-8 border rounded-xl">
    <h1 class="text-center font-bold text-xl">Create Post</h1>

    <form method="POST" action="/posts">
        @csrf

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                Title
            </label>

            <input class="border border-gray-400 p-2 w-full" type="text" name="title" id="title" value="{{ old('title') }}" required>

            @error('title')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="note">
                Note
            </label>

            <textarea class="border border-gray-400 p-2 w-full" name="note" id="note" required>{{ old('note') }}</textarea>

            @error('note')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">
                Body
            </label>

            <div class="form-group">
                <textarea class="ckeditor form-control" name="body">{{ old('body') }}</textarea>
            </div>

            @error('body')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">
                Category
            </label>

            <select name="category_id" id="category_id">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                @endforeach
            </select>

            @error('category')
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