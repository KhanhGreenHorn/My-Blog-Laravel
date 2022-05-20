@extends('layouts.layout')
@section('content')

<x-blogbody :posts="$posts" />
{{ $posts->links() }}

@endsection