@extends('layouts.app')

@section('title', 'Masuk')
@section('guest', 'true')

@section('content')
<div class="min-h-[70vh] grid place-items-center">
    <div class="w-full max-w-md">
        <h1 class="font-display text-6xl leading-none">CHAINSAW<br><span class="text-blood">MAN</span></h1>
        <p class="mt-3 mb-6 text-ink/70">Welcome CSM fanbase </p>

        <form method="POST" action="{{ route('login.process') }}" class="bg-bone border-4 border-ink shadow-panel p-6 space-y-4" novalidate>
            @csrf

            <div>
                <label for="username" class="block text-sm font-medium mb-1">Username</label>
                <input id="username" name="username" type="text" value="{{ old('username') }}" autocomplete="username"
                       class="w-full border-2 border-ink bg-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blood">
                @error('username') <p class="text-sm text-blood mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium mb-1">Password</label>
                <div class="flex">
                    <input id="password" name="password" type="password" autocomplete="current-password"
                           class="w-full border-2 border-ink bg-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blood">
                    <button type="button" id="toggle-pass" class="border-2 border-l-0 border-ink px-3 text-sm whitespace-nowrap">Lihat</button>
                </div>
                @error('password') <p class="text-sm text-blood mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="w-full bg-blood text-bone font-semibold py-3 border-2 border-ink hover:bg-ink transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-ink">
                Masuk
            </button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('#toggle-pass').on('click', function () {
        const $input = $('#password');
        const show = $input.attr('type') === 'password';
        $input.attr('type', show ? 'text' : 'password');
        $(this).text(show ? 'Sembunyikan' : 'Lihat');
    });
</script>
@endpush
