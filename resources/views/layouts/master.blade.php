<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') {{ config('app.name') }}</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg">asdas</div>
        {{-- @include('includes.header')
        @include('includes.sidebar') --}}

        <!-- Main Content -->
        <div class="main-content">
            <section class="section" style="z-index: auto">
                @yield('header')

                @yield('content')
            </section>
        </div>

    </div>
</body>

</html>
