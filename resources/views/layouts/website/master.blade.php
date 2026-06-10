<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description')">
    @hasSection('keywords')
        <meta name="keywords" content="@yield('keywords')">
    @endif

    @hasSection('og_title')
        <meta property="og:title" content="@yield('og_title')">
        <meta property="og:description" content="@yield('og_description')">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url('/') }}">
    @endif

    @php
        $fav = trim($home_page_data['header_favicon'] ?? '');
    @endphp
    @if ($fav !== '')
        <link rel="icon" href="{{ asset('admin/assets/images/page/' . $fav) }}" type="image/png">
    @else
        <link rel="icon" href="{{ asset('assets/website/favicon.svg') }}" type="image/svg+xml">
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/website/css/hytrak.css') }}">
    @stack('styles')

    @stack('schema')
</head>
<body class="hytrak-site">@include('layouts.website.header')<main>
        @yield('content')

        @include('layouts.website.footer')
    </main><script src="{{ asset('assets/website/js/hytrak.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
