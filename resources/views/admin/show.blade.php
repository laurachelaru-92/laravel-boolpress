@extends('layouts.app')

@section('content')
    <div class="container" id="admin-show-wrapper">
        <h1>{{$post->title}}</h1>
        <h5>By {{$post->user->name}}</h5>
        <p>{{$post->content}}</p>
        @if(Auth::id() == $post->user_id)
            <div id="actions">
                <a href="#" class="btn btn-warning">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
            </div>
        @endif
    </div>
@endsection