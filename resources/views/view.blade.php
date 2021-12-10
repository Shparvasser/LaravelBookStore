@extends('layouts.app')

@section('titile','View Book')

@section('content')

<h1>View book-{{$book->id}}</h1>
<div class="form-group ">
    <div class="col mb-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="text-center fw-normal">{{$book->title}}</h4>
            </div>
            <img style="width: 250px; hight: 250px"class="img-fluid card shadow-sm rounded mx-auto d-block" src="/storage/{{$book->photo}}" alt="Sorry:(">
            <div class="card-body">{{$book->content}}</div>
            <div class="py-2">Rating:{{$book->rating}}</div>
        </div>
    </div>
</div>
@endsection
