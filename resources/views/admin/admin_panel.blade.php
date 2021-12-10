@extends('layouts.app')


@section('title','Admin page')

@section('content')

<h1>Admin page</h1>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach ($books as $book)
        <div class="col mb-4">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4 class="text-center fw-normal">{{$book->title}}</h4>
                </div>
                <img class="img-fluid" src="storage/{{$book->photo}}" alt="Sorry:(">
                <div class="">Pages:{{$book->page}}</div>
                <div class="">Author:{{$book->user->name}}</div>
                <div class="py-2">{{$book->created_at}}</div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        {{-- <form action="{{route('',[$book->id])}}">
                            <button class="btn btn-sm btn-outline-secondary">Delete</button>
                        </form> --}}
                        {{-- <form action="">
                            <button class="btn btn-sm btn-outline-secondary">Edit</button>
                        </form> --}}
                    </div>
                    <div>Rating:{{$book->rating}}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

@section('aside')
    @parent
<p>Lorem, ipsum.</p>
@endsection
