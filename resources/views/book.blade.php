@extends('layouts.app')

@section('title','Book')

@section('content')
<h1>Book create</h1>

<form enctype="multipart/form-data" action="{{route('book-create')}}" method="post">
    @csrf
    <div class="form-group mb-3">
        <label for="name">Enter title</label>
        <input type="text" name="title" placeholder="Enter title" id="title" class="form-control">
    </div>
    <div class="form-group mb-3">
        <label for="name">Choose your cover</label>
        <input type="file" name="photo" id="photo" class="form-control">
    </div>
    <div class="form-group mb-3">
        <label for="name">Page</label>
        <input type="number" name="page" min="0" max="2500" step="1" id="page" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Create</button>
</form>

@endsection
