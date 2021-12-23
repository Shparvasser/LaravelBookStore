@extends('layouts.app')

@section('titile','View Book')

@section('content')

<h1>View book-{{$book->id}}</h1>
<div class="form-group">
    <div class="col mb-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="text-center fw-normal">{{$book->title}}</h4>
            </div>
            <img style="width: 250px; hight: 250px"class="img-fluid card shadow-sm rounded mx-auto d-block" src="/storage/{{$book->photo}}" alt="Sorry:(">
            <div class="card-body">{{$book->content}}</div>
            {{-- <div class="py-2">Total rating:{{$rating}}</div> --}}
        </div>
    </div>
</div>

    @foreach ($comments as $comment)
    <div class="card col mb-4">
    <div class="">
        <div class="card-header">
            <h4 class="text-center fw-normal">Comment</h4>
        </div>
        <div class="card-body">
            <div>{{$comment->comment}}</div>
        </div>
        <div class="d-flex justify-content-between">
            <div>Author: {{$comment->user->name}}</div>
            {{-- <div>Rating: {{$comment->rating}}</div> --}}
        </div>
    </div>
</div>
    @endforeach

@endsection

@section('aside')
    @parent
<p>Lorem, ipsum.</p>
<form action="{{route('book-comment',[$book->id,$book->slug])}}" method="post">
    @csrf
    <div class="form-group mb-3">
        <label for="comment">Comment:</label>
        <textarea class="form-control mb-2" name="comment" id="comment" rows="3"></textarea>
        <label for="rating">Rating:</label>
        <input type="number" min="1" max="5" step="0.1" name="rating" id="rating">
    </div>
    <button type="submit" class="btn btn-success">Send</button>
</form>
@endsection
