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
    @if (!Route::is('getBookByCategory', 'pageCategory'))
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                @if ($pages['current'] > 1)
                    <li class="page-item"><a class="page-link"
                            href="{{ route('page', [$pages['current'] - 1]) }}">Previous</a>
                    </li>
                @endif
                @for ($i = 1; $i <= $pages['paging']; $i++)
                    <li class="page-item @if ($pages['current'] == $i) active @endif"><a class="page-link"
                            href="{{ route('page', [$i]) }}">{{ $i }}</a></li>
                @endfor
                @if ($pages['current'] < $pages['paging'])
                    <li class="page-item"><a class="page-link"
                            href="{{ route('page', [$pages['current'] + 1]) }}">Next</a>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
    @if (Route::is('getBookByCategory', 'pageCategory'))
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                @if ($pages['current'] > 1)
                    <li class="page-item"><a class="page-link"
                            href="{{ route('pageCategory', [$id, $pages['current'] - 1]) }}">Previous</a>
                    </li>
                @endif
                @for ($i = 1; $i <= $pages['paging']; $i++)
                    <li class="page-item @if ($pages['current'] == $i) active @endif"><a class="page-link"
                            href="{{ route('pageCategory', [$id, $i]) }}">{{ $i }}</a>
                    </li>
                @endfor
                @if ($pages['current'] < $pages['paging'])
                    <li class="page-item"><a class="page-link"
                            href="{{ route('pageCategory', [$id, $pages['current'] + 1]) }}">Next</a>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
@endsection

@section('aside')
    @parent
    <p>Lorem, ipsum.</p>
@endsection
