<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    @if (Auth::check())
        @include('inc.headerAuth')
    @else
        @include('inc.header')
    @endif
    <div class="container mt-5">
        @include('inc.messages')
        <div class="row">
            <div class="col-8">
                @yield('content')
            </div>
            <div class="col-4">
                @include('inc.aside')
            </div>
        </div>
    </div>
    @include('inc.footer')
    <script src="/js/bootstrap.min.js"></script>
</body>

</html>
