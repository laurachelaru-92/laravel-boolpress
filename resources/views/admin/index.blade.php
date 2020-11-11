@extends('layouts.app')

@section('content')
    <div class="container" id="admin-index-wrapper">
        @if(Auth::id())
            <div id="create-new">
                <a href="{{route('admin/posts.create')}}" class="btn btn-primary">Add new post</a>
            </div>
        @endif
        @foreach ($posts as $post)            
            <div class="card">
                <div class="card-header">
                    <h4>{{$post->title}}</h4>
                </div>
                <div class="card-body">
                    <p class="card-text">By {{$post->user->name}}</p>
                    <a href="{{route('admin/posts.show', $post->slug)}}" class="btn btn-primary">Show more</a>
                    @if(Auth::id() == $post->user_id)
                        <a href="{{route('admin/posts.edit', $post->slug)}}" class="btn btn-warning">Edit</a>
                        <form action="{{route('admin/posts.destroy', $post->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection