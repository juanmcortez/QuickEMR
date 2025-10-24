<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title / Description -->
    <title>
        @sectionMissing('title')
            {{ config('app.name') }}
            @else
                @yield('title') | {{ config('app.name') }}
            @endif
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/base_theme.css', 'resources/js/base_theme.js'])
    @endif
</head>
<body>

{{-- STATUS --}}
@if (session('status') === 'two-factor-authentication-enabled')
    <div class="status_message">{{ __('Please finish configuring two factor authentication below.') }}</div>
@elseif(session('status') === 'two-factor-authentication-confirmed')
    <div class="status_message">{{ __('Two factor authentication confirmed and enabled successfully.') }}</div>
@elseif(session('status') === 'verification-link-sent')
    <div class="status_message">{{ __('A new email verification link has been emailed to you!s') }}</div>
@elseif(session('status'))
    <div class="status_message success">{{ session('status') }}</div>
@endif
{{-- STATUS --}}

{{-- ERRORS --}}
@if ($errors->any())
    <div class="error_message">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- ERRORS --}}

<x-layouts.parts.header/>

{{ $slot }}
</body>
</html>
