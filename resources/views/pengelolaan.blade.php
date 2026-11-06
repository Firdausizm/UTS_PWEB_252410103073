@extends('layouts.app')

@section('title', 'Pengelolaan')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
        <div>
            <h1 class="font-display text-4xl sm:text-5xl">Pengelolaan episode</h1>
        </div>
    </div>

    <section class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($episodes as $episode)
            <x-episode-card :episode="$episode" />
        @endforeach
    </section>

@endsection

@push('scripts')
<script>

    $('.fav-btn').on('click', function () {
        const $btn = $(this), on = !$btn.data('on');
        $btn.data('on', on)
            .text(on ? 'Favorit' : 'Tandai favorit')
            .toggleClass('bg-blood text-bone border-blood', on);
    });
</script>
@endpush
