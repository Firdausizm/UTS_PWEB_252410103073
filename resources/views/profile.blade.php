@extends('layouts.app')

@section('title', 'Profil')

@section('content')
    <h1 class="font-display text-4xl sm:text-5xl">Profil</h1>

    <div class="mt-6 bg-bone border-4 border-ink shadow-panel max-w-xl">
        <div class="bg-ink text-bone px-5 py-6 flex items-center gap-4">
            <div class="w-14 h-14 bg-blood grid place-items-center font-display text-3xl">{{ strtoupper(substr($username, 0, 1)) }}</div>
            <div>
                <p class="text-xs text-bone/70">Username</p>
                <p class="text-xl font-semibold">{{ $username }}</p>
            </div>
        </div>

        <dl class="divide-y-2 divide-ink">
            @foreach ($details as $label => $value)
                <div class="flex justify-between gap-4 px-5 py-3">
                    <dt class="text-ink/70">{{ $label }}</dt>
                    <dd class="font-medium">{{ $value }}</dd>
                </div>
            @endforeach
        </dl>
    </div>
@endsection
