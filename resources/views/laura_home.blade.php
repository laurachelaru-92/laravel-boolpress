@extends('layouts.app')

@section('content')
    <div class="container" id="laura-home-wrapper">
        @if(Auth::id())
            <div id="create-new">
                <a href="{{route('admin/posts.create')}}" class="btn btn-primary">Add new post</a>
            </div>
        @endif
        <h1>Boolpress blog</h1>
        <a href="{{ Auth::id() ? route('admin/posts.index') : route('posts')}}">Go to posts</a>
    </div>
@endsection