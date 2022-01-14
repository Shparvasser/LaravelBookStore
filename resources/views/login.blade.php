@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <form action="{{ route('login-form') }}" method="post">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Enter your email</label>
            <input type="email" name="email" placeholder="Enter your email" id="email" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="name">Enter your password</label>
            <input type="password" name="password" placeholder="Enter your password" id="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Login</button>
    </form>
@endsection

@section('aside')
    @parent
    <p>Lorem, ipsum.</p>
@endsection
