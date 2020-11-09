@extends('layouts.app')

@section('content')
    <div id="laura-home-wrapper">
        <h1>Posts</h1>
        <a href="{{ Auth::id() ? route('admin/posts') : route('posts')}}">Go to posts</a>
    </div>
@endsection