@props(['post'])
<div class="space-x-2">

    @if ($post->category->trashed())
    <a href="/?category={{$post->category->name}}" class="px-3 py-1 border border-gray-300 rounded-full text-gray-300 text-xs uppercase line-through">{{$post->category->name}}</a>
    @else
    <a href="/?category={{$post->category->name}}" class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold" style="font-size: 10px">{{$post->category->name}}</a>
    @endif
</div>