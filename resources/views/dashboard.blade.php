@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="font-display text-4xl sm:text-5xl">Halo, {{ $username }}</h1>
    <p class="mt-1 text-ink/70">Ringkasan performa seluruh episode pada season 1.</p>

    <section class="mt-8 grid gap-6 sm:grid-cols-3">
        <x-stat-card label="Total tayangan"  :value="$totalViews"     note="Gabungan 12 episode" />
        <x-stat-card label="Jumlah menyukai" :value="$totalLikes"     note="Gabungan 12 episode" />
        <x-stat-card label="Total unduhan"   :value="$totalDownloads" note="Gabungan 12 episode" />
    </section>

    <section class="mt-10">
        <h2 class="font-display text-2xl">Tiga episode terpopuler</h2>
        <ol class="mt-4 bg-bone border-4 border-ink divide-y-2 divide-ink">
            @foreach ($topEpisodes as $episode)
                <li class="flex items-center justify-between gap-4 px-4 py-3">
                    <span><span class="font-semibold">Episode {{ $episode['number'] }}</span> &ndash; {{ $episode['title'] }}</span>
                    <span class="text-sm text-ink/70 whitespace-nowrap">{{ number_format($episode['views'], 0, ',', '.') }} tayangan</span>
                </li>
            @endforeach
        </ol>
        <a href="{{ route('pengelolaan', ['username' => $username]) }}"
           class="inline-block mt-5 bg-ink text-bone px-4 py-2 text-sm font-medium hover:bg-blood">Kelola episode</a>
    </section>
@endsection

@push('scripts')
<script>
    // Angka menghitung naik sekali saat halaman dibuka
    $('[data-count]').each(function () {
        const $el = $(this), target = parseInt($el.data('count'), 10);
        $({ n: 0 }).animate({ n: target }, {
            duration: 900,
            step: function (now) { $el.text(Math.floor(now).toLocaleString('id-ID')); },
            complete: function () { $el.text(target.toLocaleString('id-ID')); }
        });
    });
</script>
@endpush
