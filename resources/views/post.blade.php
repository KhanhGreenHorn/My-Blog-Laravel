@extends('layouts.layout')

@section('content')

    <article>
        <h1>
            {{$post->title}}
        </h1>

        <p>
            By <a href="/authors/{{$post->author->name}}">{{$post->author->name}}</a> in <a href="/categories/{{$post->category->name}}">{{$post->category->name}}</a>
        </p>

        <div>
            {{$post->body}}
        </div>

        <a href="/">Go back</a>
    </article>

@endsection