@extends('layouts.layout')
@section('content')
<meta name="csrf-token" content="{{ Session::token() }}">


<section class="px-6 py-5 border border-black-400">

    <h1 class="text-center font-mono"> Categories Control Panel</h1>

    <form method="POST" action="/categories">
        @csrf
        <h2 class="block mb-2 uppercase font-bold text-xs text-gray-700">Create new category</h2>
        <div class="mb-6">
            <label class="block mb-2 uppercase text-xs text-gray-700" for="name">
                Name
            </label>

            <input class="border border-gray-400 p-2 w-half" type="text" name="name" id="name" required>

            @error('name')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase text-xs text-gray-700" for="description">
                Description
            </label>

            <input class="border border-gray-400 p-2 w-half" type="text" name="description" id="description" required>

            @error('description')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-6 mt-5">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                Create
            </button>
        </div>
    </form>

    <hr class="solid p-2">

    <form id="deleteform" action="/#" method="POST" class="flex" onsubmit="submitURL()">
        @csrf
        @method('DELETE')
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">
                Delete existing category
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
            <button onclick="submitURL()" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                Delete
            </button>
        </div>
    </form>

    <script>
        function submitURL() {
            var input = document.getElementById('category_id');
            var form = document.getElementById('deleteform');

            form.action = `/categories/${input.value}`;
            form.submit();
        }

        // let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // const submitURL = async () => {
        //     let selected = document.getElementById('category_id').value;
        //     let url = `http://localhost:8000/categories/${selected}`;
        //     fetch(url, {
        //         method: 'DELETE',
        //         headers: {
        //             "Content-Type": "application/json",
        //             "X-CSRF-TOKEN": token,
        //         },
        //         credentials: "same-origin",
        //         body: JSON.stringify({
        //             name: 'Tushar',
        //             number: '78987'
        //         })
        //     })
        //     // .then((data) => {
        //     //     window.location.href = '/';
        //     // })
        //     // .catch(function(error) {
        //     //     console.log(error);
        //     // });
        // }
    </script>
</section>

@stop