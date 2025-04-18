@props(['heading' => '$heading'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Front End Developer') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-neutral-950 text-white">
    @unless(request()->routeIs('auth.login') || request()->routeIs('auth.register'))
        <x-navigation/>
    @endunless

    <div class="container mx-auto mt-10 mb-5 px-20">
        <h1 class="text-2xl font-bold ">{{ $heading }}</h1>
    </div>

    <main class="container mx-auto py-4 px-20">
        {{ $slot }}
    </main>
</body>
</html>