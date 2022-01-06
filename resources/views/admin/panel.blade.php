@extends('layouts.app')


@section('title','Admin page')

@section('content')

<h1>Admin page</h1>
<a class="list-group-item list-group-item-action" href="{{route('admin-books')}}">Books</a>
<a class="list-group-item list-group-item-action" href="{{route('admin-categories')}}">Categories</a>

@endsection

@section('aside')
    @parent
<p>Lorem, ipsum.</p>

@endsection
