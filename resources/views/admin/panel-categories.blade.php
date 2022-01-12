@extends('layouts.app')


@section('title','Admin page')

@section('content')

<h1>Admin page</h1>
<a class="list-group-item list-group-item-action" href="{{route('admin-books')}}">Books</a>
<a class="list-group-item list-group-item-action" href="{{route('admin-categories')}}">Categories</a>
<table class="table">
    <th>Title:</th>
    <th>Edit:</th>
    <th>Delete:</th>
    @foreach ($categories as $category)
        <tr>
            <td>{{$category->title}}</td>
            <td class="d-flex justify-content-between">
                <form action="{{route('category-edit',[$category->id])}}">
                    <button class="btn btn-sm btn-outline-secondary">Edit</button>
                </form>
            </td>
            <td>
                <form action="{{route('category-delete',[$category->id])}}">
                    <button class="btn btn-sm btn-outline-secondary">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection

@section('aside')
    @parent
<p>Lorem, ipsum.</p>

<h1>Create category</h1>

<form action="{{route('category-create',$category->id)}}" method="post">
    @csrf
    <div class="form-group mb-3">
        <label for="title">Enter title category</label>
        <input type="text" name="title" placeholder="Enter title category" id="title" class="form-control" value="{{old('title')}}">
    </div>
    <button type="submit" class="btn btn-success">Create</button>
</form>
@endsection
