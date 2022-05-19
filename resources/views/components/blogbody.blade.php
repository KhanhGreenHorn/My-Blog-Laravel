@props(['posts'])
@if ($posts->count() != 0)
    <x-featuredpostcard :post="$posts[0]"/>

    <div class="lg:grid lg:grid-cols-6">
        @foreach ($posts->skip(1) as $post)
            <x-postcard 
            :post="$post"
            class="{{$loop->iteration < 3 ? 'col-span-3' : 'col-span-2'}}"
            />
        @endforeach                
    </div>

    @else <p class="text-center">No posts yet. Please try again later</p>
@endif