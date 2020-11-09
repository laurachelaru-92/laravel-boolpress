@extends('layouts.app')

@section('content')
    <div class="container" id="guest-posts-wrapper">
        @foreach ($posts as $post)            
            <div class="card">
                <div class="card-header">
                    <h4>{{$post->title}}</h4>
                </div>
                <div class="card-body">
                    <p class="card-text">By {{$post->user->name}}</p>
                    <a href="{{route('admin/posts/show', $post->slug)}}" class="btn btn-primary">Show more</a>
                    @if(Auth::id() == $post->user_id)
                        <a href="#" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection