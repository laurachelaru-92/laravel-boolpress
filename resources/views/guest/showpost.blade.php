@extends('layouts.app')

@section('content')
    <div class="container" id="guest-showpost-wrapper">
        <h1>{{$post->title}}</h1>
        <h5>By {{$post->user->name}}</h5>
        <p>{{$post->content}}</p>
        <img src="{{asset('storage/'.$post->image)}}" alt="">
    </div>
@endsection