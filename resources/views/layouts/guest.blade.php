<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" sizes="any">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    @vite(['resources/css/app.css'])
</head>

<body class="">
<main class="content p-def f-ai-center f-column f-jc-center">
    <div class="m-def p-def">
        <a href="/">
            <x-application-logo class=""/>
        </a>
    </div>

    <div class="">
        {{ $slot }}
    </div>
</main>
</body>
</html>
