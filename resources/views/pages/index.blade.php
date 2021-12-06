@extends('layouts.main-layout')

@section('title', 'My blog')

@section('content')
@php
    \App\Models\Post::Fact(13,5);
@endphp

<div class="btn-group mb-4" role="group" aria-label="Basic outlined example">
    <a href="#" class="btn btn-outline-primary active">Category 1</a>
    <a href="#" class="btn btn-outline-primary">Category 2</a>
    <a href="#" class="btn btn-outline-primary">Category 3</a>
    <a href="#" class="btn btn-outline-primary">Category 4</a>
    <a href="#" class="btn btn-outline-primary">Category 5</a>
</div>
@foreach($posts as $post)
<div class="card mb-4">
    <div class="card-header">
        <a href="{{route('getPostsByCategory', $post->category['slug'])}}">{{$post->category['title']}}</a>
    </div>
    <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
        <p class="card-text">{{$post->description}}</p>
        <a href="#" class="btn btn-primary">Read more</a>
    </div>
</div>
@endforeach
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
</nav>
@endsection
