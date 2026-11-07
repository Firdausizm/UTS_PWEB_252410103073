@props(['episode'])

<article class="episode-card relative isolate overflow-hidden border-4 border-ink shadow-panel flex flex-col text-bone">
    <img src="{{ asset('assets/makima.jpg') }}" alt="" class="absolute inset-0 h-full w-full object-cover object-center" loading="lazy" decoding="async">
    <div class="absolute inset-0 bg-ink/55"></div>

    <div class="relative bg-ink/60 px-4 py-6 flex items-end justify-between">
        <span class="font-display text-6xl leading-none text-blood">{{ str_pad($episode['number'], 2, '0', STR_PAD_LEFT) }}</span>
        <span class="text-xs">{{ $episode['duration'] }}</span>
    </div>

    <div class="relative p-4 flex-1 flex flex-col">
        <h3 class="font-semibold text-lg leading-snug">{{ $episode['title'] }}</h3>

        <dl class="mt-3 grid grid-cols-3 gap-2 text-center text-xs">
            <div><dt class="text-bone/70">Tayangan</dt><dd class="font-semibold text-sm">{{ number_format($episode['views'], 0, ',', '.') }}</dd></div>
            <div><dt class="text-bone/70">Suka</dt><dd class="font-semibold text-sm">{{ number_format($episode['likes'], 0, ',', '.') }}</dd></div>
            <div><dt class="text-bone/70">Unduhan</dt><dd class="font-semibold text-sm">{{ number_format($episode['downloads'], 0, ',', '.') }}</dd></div>
        </dl>

        <button type="button"
                class="fav-btn mt-4 border-2 border-bone px-3 py-2 text-sm font-medium text-bone hover:bg-bone hover:text-ink focus:outline-none focus-visible:ring-2 focus-visible:ring-blood">
            Tandai favorit
        </button>
    </div>
</article>
