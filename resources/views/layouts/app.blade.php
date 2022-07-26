<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}- DEFAUL TABLE</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ config('flatpickr.plugins.flat_piker.css') }}">
    <link rel="stylesheet" href="{{ mix('css/table.css') }}" />
    @livewireStyles
    <wireui:scripts />
    <!-- Scripts- -->
    <script src="{{ mix('js/table.js') }}" defer></script>

</head>

<body class="font-sans antialiased">
    <x-dialog z-index="z-50" blur="md" align="center" />
    <x-notifications z-index="z-50" />
    <div class="min-h-screen bg-gray-100">
        @include('tall-table::loader')
        @include('tall-table::navigation-menu')
        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    @stack('modals')

    @livewireScripts
    @if (filled(config('flatpickr.plugins.flat_piker.js')))
        <script src="{{ config('flatpickr.plugins.flat_piker.js') }}"></script>
    @endif
    @if (filled(config('flatpickr.plugins.flat_piker.translate')))
        <script src="{{ config('flatpickr.plugins.flat_piker.translate') }}"></script>
    @endif
    @stack('scripts')
</body>

</html>