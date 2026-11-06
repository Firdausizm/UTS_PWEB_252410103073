@props(['episode'])

<article class="episode-card bg-bone border-4 border-ink shadow-panel flex flex-col">
    <div class="bg-ink text-bone px-4 py-6 flex items-end justify-between">
        <span class="font-display text-6xl leading-none text-blood">{{ str_pad($episode['number'], 2, '0', STR_PAD_LEFT) }}</span>
        <span class="text-xs">{{ $episode['duration'] }}</span>
    </div>

    <div class="p-4 flex-1 flex flex-col">
        <h3 class="font-semibold text-lg leading-snug">{{ $episode['title'] }}</h3>

        <dl class="mt-3 grid grid-cols-3 gap-2 text-center text-xs">
            <div><dt class="text-ink/60">Tayangan</dt><dd class="font-semibold text-sm">{{ number_format($episode['views'], 0, ',', '.') }}</dd></div>
            <div><dt class="text-ink/60">Suka</dt><dd class="font-semibold text-sm">{{ number_format($episode['likes'], 0, ',', '.') }}</dd></div>
            <div><dt class="text-ink/60">Unduhan</dt><dd class="font-semibold text-sm">{{ number_format($episode['downloads'], 0, ',', '.') }}</dd></div>
        </dl>

        <button type="button"
                class="fav-btn mt-4 border-2 border-ink px-3 py-2 text-sm font-medium hover:bg-ink hover:text-bone focus:outline-none focus-visible:ring-2 focus-visible:ring-blood">
            Tandai favorit
        </button>
    </div>
</article>
