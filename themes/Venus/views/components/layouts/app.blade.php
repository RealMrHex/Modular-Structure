<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ config('app.dir') }}">
<head>
    <title>{{ $title ?? config('app.name') }}</title>
    <meta charset="utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="shortcut icon" href="{{ asset('fav.svg') }}"/>
    <link rel="icon" href="{{ asset('fav.svg') }}">

    @vite(
        [
            'resources/css/app.css',
            'resources/js/app.js',
            'resources/fonts/kalameh/loader.css',
        ],
        'Venus'
    )

    <link href="{{ asset('vassets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vassets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>
<body @stack('body-attr')>
<!--begin::Theme mode setup on page load-->
<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
<!--end::Theme mode setup on page load-->
{{ $slot }}
<!--begin::Javascript-->
<script src="{{ asset('vassets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('vassets/js/scripts.bundle.js') }}"></script>
<!--end::Javascript-->
</body>
</html>
