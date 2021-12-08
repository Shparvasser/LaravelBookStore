@extends('layouts.app')

@section('title','Account')

@section('content')
<h1>My Account</h1>
<div class="mb-4">
    <div>Hello, {{$user->name}}</div>
    <div>Email: {{$user->email}}</div>
</div>
@endsection

@section('aside')
    @parent
<p>If you want to register a new user,you need to logout</p>
<a href="/logout">Logout</a>
<a href="/book">Create book</a>
@endsection
