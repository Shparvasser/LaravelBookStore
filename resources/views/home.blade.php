@extends('layouts.app')


@section('title', 'Main page')

@section('content')

    <h1>Main page</h1>
    <div class="mb-4" role="group" aria-label="Basic outlined example">
        @foreach ($categories as $category)
            <a href="{{ route('getBookByCategory', [$category->id]) }}"
                class="btn btn-outline-primary">{{ $category->title }}</a>
        @endforeach
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($ratings as $rating)
            <div class="col mb-4">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4 class="text-center fw-normal">{{ $rating->title }}</h4>
                    </div>
                    <img class="img-fluid" src="{{ asset($rating->photo) }}" alt="Sorry:(">
                    <div class="">Pages:{{ $rating->page }}</div>
                    <div class="">Author:{{ $rating->user->name }}</div>
                    <div class="py-2">{{ $rating->created_at }}</div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <form action="{{ route('book-show', [$rating->slug]) }}">
                                <button class="btn btn-sm btn-outline-secondary">View</button>
                            </form>
                        </div>
                        <div>
                            @if ($rating->rating)
                                <div>Rating: {{ round($rating->rating, 2) }}</div>
                            @else
                                <div>Not currently rated now</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div>{{ $ratings->links('pagination::bootstrap-4') }}</div>
@endsection

@section('aside')
    @parent
    <p>Lorem, ipsum.</p>
@endsection
