@extends('layouts.app')

@section('content')
    <div class="container" id="admin-edit-wrapper">
        <form action="{{route('admin/posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input required type="text" name="title" class="form-control" id="title" placeholder="The title of your post..." maxlength="50" value="{{old('title') ? old('title') : $post->title}}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control" id="image" placeholder="Add an image..." accept="image/*" value="{{old('image') ? old('image') : ''}}">
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Text</label>
                <textarea required name="content" class="form-control" id="content" cols="30" rows="10" minlength="30" placeholer="Your text...">
                    {{ old('content') ? old('content') : $post->content}}
                </textarea>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
          </form>
    </div>
@endsection