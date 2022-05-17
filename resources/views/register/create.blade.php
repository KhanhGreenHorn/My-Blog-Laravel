<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<body style="font-family: Open Sans, sans-serif">

    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>
        </nav>


        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl"> Register Form </h1>

            <form method="POST" action="/register" class="mt-10">
                @csrf

                <div class="mb-6\">
                    <label class="block mb-2 text-xs font-bold text-gray-700" for="name">
                        name
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="name" value="{{old('name')}}" id="name" required>
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6\">
                    <label class="block mb-2 text-xs font-bold text-gray-700" for="name">
                        email
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="email" value="{{old('email')}}" id="email" required>
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6\">
                    <label class="block mb-2 text-xs font-bold text-gray-700" for="name">
                        password
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="password" name="password" value="{{old('password')}}" id="password" required>
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6 mt-5">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Submit
                    </button>
                </div>
            </form>
            <p>or <a href="/login" class="underline">login</a></p>
        </main>
    </section>
</body>