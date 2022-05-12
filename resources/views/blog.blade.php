@extends('layouts.layout')

@section('content')

    @foreach($posts as $post) 
        <article>
        <h1>
            <a href="/posts/{{$post->title}}">
                {{$post->title}}
            </a>
        </h1>

        <p>
            By <a href="/authors/{{$post->author->name}}">{{$post->author->name}}</a> in <a href="/categories/{{$post->category->name}}">{{$post->category->name}}</a>
        </p>

        <div>
            {{$post->note}}
        </div>
        
    </article>
    @endforeach

@endsection


