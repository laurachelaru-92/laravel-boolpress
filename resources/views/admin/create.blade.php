@extends('layouts.app')

@section('content')
    <div class="container" id="admin-create-wrapper">
        <form action="{{route('admin/posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="title">Title</label>
                <input required type="text" name="title" class="form-control" id="title" placeholder="The title of your post..." maxlength="50" value="{{old('title')}}" />
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <h6>Tags</h6>
                <ul>
                    @foreach ($tags as $tag)
                    <li>
                        <input name="tags[]" type="checkbox" value="{{$tag->id}}" id="{{$tag->id}}" 
                        {{-- @if (old())
                        checked
                        @endif --}}
                        >
                        <label for="{{$tag->id}}">{{$tag->name}}</label>
                    </li>
                    @endforeach
                </ul>
                @error('tags')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control" id="image" placeholder="Add an image..." accept="image/*">
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Text</label>
                <textarea required name="content" class="form-control" id="content" cols="30" rows="10" minlength="30" placeholder="Your text...">
                    {{ old('content')}}
                </textarea>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
          </form>
    </div>
@endsection