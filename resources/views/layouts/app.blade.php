@php
    $title     = View::hasSection('title') ? View::getSection('title') : config('app.name', 'Hirondelle');
    $sub_title = View::hasSection('sub-title') ? View::getSection('sub-title') : '';
    $title = $sub_title ? trim($title) . ' :: ' . trim($sub_title) : trim($title);
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <meta name="author" content="@yield('meta_author', 'Author')">
    <meta name="description" content="@yield('meta_description', 'Hirondelle')">
    <meta name="keywords" content="@yield('meta_keywords', 'php, framework, web')">
@hasSection('metas')
    @yield('metas')
@endif
    <link rel="shortcut icon" href="favicon.ico" />
    <!-- Styles -->
@stack('before-styles')
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
@stack('after-styles')
    <!-- Styles -->
</head>
<body>
<div id="app">
    {{-- --}}
    <section class="mb-3">
        @include('layouts._partials.header')
    </section>
    {{-- --}}
    <section>
        <div class="container mb-3">
            @include('layouts._partials.messages')
        </div>
    </section>
    {{-- --}}
    <main role="main" class="container-fluid px-3">
        @yield('content')
    </main>
    {{-- --}}
    <section class="mt-2">
        @includeIf('layouts._partials.footer')
    </section>
</div>
    <!-- Scripts -->
@stack('before-scripts')
    <script src="{{ mix('js/app.js') }}"></script>{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
@stack('after-scripts')
    <!-- Scripts -->
@env('local')
    <script src="{{ mix('js/dev/holderjs.js') }}"></script>
@endenv
</body>
</html>
