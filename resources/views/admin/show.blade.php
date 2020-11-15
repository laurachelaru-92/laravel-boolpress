@extends('layouts.app')

@section('content')
    <div class="container" id="admin-show-wrapper">
        <h1>{{$post->title}}</h1>
        <h5>By {{$post->user->name}}</h5>
        <p>{{$post->content}}</p>
        @if (strpos($post->image, 'http') === 0)
            <img src="{{$post->image}}" alt="random picture">
        @else
            <img src="{{asset('storage/'.$post->image)}}" alt="">
        @endif
        @if(!empty($post->tags))
        <div id="tags">
            <span id="tags-title">Tags: </span>
            @foreach ($post->tags as $tag)
            <span>{{$tag->name}}</span>
            @endforeach
        </div>
        @endif
        @if(Auth::id() == $post->user_id)
            <div id="actions">
                <a href="{{route('admin/posts.edit', $post->slug)}}" class="btn btn-warning">Edit</a>
                <form action="{{route('admin/posts.destroy', $post->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        @endif
    </div>
@endsection