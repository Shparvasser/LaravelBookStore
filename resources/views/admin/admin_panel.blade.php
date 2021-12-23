@extends('layouts.app')


@section('title','Admin page')

@section('content')

<h1>Admin page</h1>
<table class="table">
    <th>Author:</th>
    <th>Title:</th>
    <th>Created-at:</th>
    <th>Updated-at:</th>
    <th>Action:</th>
    @foreach ($books as $book)
        <tr>
            <td>{{$book->user->name}}</td>
            <td>{{$book->title}}</td>
            <td>{{$book->created_at}}</td>
            <td>{{$book->updated_at}}</td>
            <td class="d-flex justify-content-between">
                <form action="{{route('book-edit',[$book->slug])}}">
                    <button class="btn btn-sm btn-outline-secondary">Edit</button>
                </form>
                <form action="{{route('book-delete',[$book->slug])}}">
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
@endsection
