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
                    <a href="{{route('posts.show', $post->slug)}}" class="btn btn-primary">Show more</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection