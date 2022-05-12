@extends('layouts.layout')

@section('content')

    <article>
        <h1>
            {{$post->title}}
        </h1>

        <p>
            {{$post->body}}
        </p>

        <a href="/">Go back</a>
    </article>

@endsection