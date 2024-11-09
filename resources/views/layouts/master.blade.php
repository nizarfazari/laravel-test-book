<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') {{ config('app.name') }}</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="main-wrapper main-wrapper-1">
        <div class="p-10">
            <div class="text-center">
                <h1 class="text-5xl font-bold">Laravel Test Book</h1>
            </div>
        </div>
        <!-- Main Content -->
        <div class="main-content">
            <section class="section" style="z-index: auto">
                @yield('header')

                @yield('content')
            </section>
        </div>

    </div>
</body>

@vite('resources/js/app.js')
</html>
