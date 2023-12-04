<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ config('app.dir') }}">
<head>
    <title>{{ $title ?? config('app.name') }}</title>
    <meta charset="utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}"/>
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    @vite(
        [
            'resources/css/app.css',
            'resources/js/app.js',
        ],
        'Venus'
    )
</head>
<body @stack('body-attr')>
{{ $slot }}
</body>
</html>
