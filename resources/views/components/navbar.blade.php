@php
    $links = [
        ['label' => 'Dashboard',   'route' => 'dashboard'],
        ['label' => 'Pengelolaan', 'route' => 'pengelolaan'],
        ['label' => 'Profil',      'route' => 'profile'],
    ];
@endphp

<header class="bg-ink text-bone">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 flex items-center justify-between h-16">
        <a href="{{ route('dashboard', ['username' => $username]) }}" class="font-display text-2xl tracking-wide">
            CHAINSAW<span class="text-blood">MAN</span>
        </a>

        <button id="menu-toggle" class="md:hidden border-2 border-bone px-3 py-1 text-sm focus:outline-none focus-visible:ring-2 focus-visible:ring-blood" aria-label="Buka menu">Menu</button>

        <nav class="hidden md:flex items-center gap-1">
            @foreach ($links as $link)
                <a href="{{ route($link['route'], ['username' => $username]) }}"
                   class="px-3 py-2 text-sm font-medium {{ request()->routeIs($link['route']) ? 'bg-blood text-bone' : 'hover:bg-bone hover:text-ink' }}">
                    {{ $link['label'] }}
                </a>
            @endforeach
            <a href="{{ route('login') }}" class="ml-2 px-3 py-2 text-sm border-2 border-bone hover:bg-bone hover:text-ink">Keluar</a>
        </nav>
    </div>

    {{-- Menu mobile --}}
    <nav id="menu-mobile" class="hidden md:hidden border-t border-bone/30 px-4 pb-3">
        @foreach ($links as $link)
            <a href="{{ route($link['route'], ['username' => $username]) }}" class="block py-2 text-sm">{{ $link['label'] }}</a>
        @endforeach
        <a href="{{ route('login') }}" class="block py-2 text-sm text-blood">Keluar</a>
    </nav>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('#menu-toggle').on('click', function () {
            $('#menu-mobile').toggleClass('hidden');
        });
    });
</script>
