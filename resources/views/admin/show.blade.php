@extends('layouts.app')

@section('content')
    <div class="container" id="admin-show-wrapper">
        <h1>{{$post->title}}</h1>
        <h5>By {{$post->user->name}}</h5>
        <p>{{$post->content}}</p>
        <img src="{{asset('storage/'.$post->image)}}" alt="">
        @if(Auth::id() == $post->user_id)
            <div id="actions">
                <a href="{{route('admin/posts.edit', $post->slug)}}" class="btn btn-warning">Edit</a>
                <a href="{{route('admin/posts.destroy', $post->id)}}" class="btn btn-danger">Delete</a>
            </div>
        @endif
    </div>
@endsection