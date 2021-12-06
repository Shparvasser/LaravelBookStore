@extends('layouts.app')

@section('title','Sign-Up')

@section('content')
<h1>Sign-up page</h1>

<form action="/contact/submit" method="post">
    <div class="form-group mb-3">
        <label for="name">Enter your name</label>
        <input type="text" name="name" placeholder="Enter your name" id="name" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="name">Enter your email</label>
        <input type="email" name="email" placeholder="Enter your email" id="email" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="name">Enter your password</label>
        <input type="password" name="password" placeholder="Enter your password" id="password" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Send</button>

</form>

@endsection

@section('aside')
    @parent
<p>Lorem, ipsum.</p>
@endsection
