<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-white">

        <!-- Page Heading -->
        @if (isset($header))
            <section class="px-8 py-4 mb-6">
                <header class="container mx-auto">

                    {{ $header }}

                </header>
            </section>
        @endif

        <!-- Page Content -->
        <section class="px-8">
            <main class="container mx-auto">
                <div class="lg:flex lg:justify-center">
                    <div class="lg:w-32">
                        <x-twitter.sidebar-links />
                    </div>

                    <div class="lg:flex-1 lg:mx-10 lg:mb-10" style="max-width: 700px">
                        {{ $slot }}
                    </div>

                    @auth
                        <div class="lg:w-1/6">
                            <x-twitter.friends-list />
                        </div>
                    @endauth
                </div>
            </main>
        </section>
    </div>
    @livewireScripts
    <script src="http://unpkg.com/turbolinks"></script>
</body>

</html>
