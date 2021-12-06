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
@endsection

@section('aside')
    @parent
<p>Lorem, ipsum.</p>
@endsection
