<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Chainsaw Man') · Pengelola Anime</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=IBM+Plex+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: {
                colors: { ink: '#000', blood: '#D7261E', concrete: '#D8D6D0', bone: '#F3F1EC' },
                fontFamily: { display: ['Anton', 'Impact', 'sans-serif'], body: ['"IBM Plex Sans"', 'sans-serif'] },
                boxShadow: { panel: '6px 6px 0 0 #000' },
            } }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body class="bg-concrete font-body text-ink min-h-screen flex flex-col">

    @sectionMissing('guest')
        @include('components.navbar')
    @endif

    <main class="flex-1 w-full max-w-6xl mx-auto px-4 sm:px-6 py-8">
        @yield('content')
    </main>

    <x-footer />

    @stack('scripts')
</body>
</html>
