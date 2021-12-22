@extends('layouts.app')


@section('title','Main page')

@section('content')

<h1>Main page</h1>
<div class="mb-4" role="group" aria-label="Basic outlined example">
    <a href="#" class="btn btn-outline-primary active">Category 1</a>
    <a href="#" class="btn btn-outline-primary">Category 2</a>
    <a href="#" class="btn btn-outline-primary">Category 3</a>
    <a href="#" class="btn btn-outline-primary">Category 4</a>
    <a href="#" class="btn btn-outline-primary">Category 5</a>
</div>
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
                        <form action="{{route('book-show',[$book->id,$book->slug])}}">
                            <button class="btn btn-sm btn-outline-secondary">View</button>
                        </form>
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
