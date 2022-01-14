@extends('layouts.app')

@section('title', 'Edit book')

@section('content')
    <h1>Edit category-{{ $category->id }}</h1>

    <form action="{{ route('category-update', $category->id) }}" method="post">
        @csrf
        <div class="form-group mb-3">
            <label for="title">Enter title category</label>
            <input type="text" name="title" placeholder="Enter title category" id="title" class="form-control"
                value="{{ $category->title }}">
        </div>
        <button type="submit" class="btn btn-success">Edit</button>
    </form>

@endsection
