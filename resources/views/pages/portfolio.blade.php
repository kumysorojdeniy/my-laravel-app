@extends('layouts.app')

@section('title', 'Портфолио — MiniForge')

@section('content')
    <section class="mx-auto max-w-6xl px-4 py-16">
        <div class="mb-10 text-center">
            <h1 class="text-4xl font-black tracking-tight">Портфолио</h1>
            <p class="mt-4 text-zinc-400">Работы по категориям: варгеймы, бюсты и террейн.</p>
        </div>

        <div class="mb-10 flex flex-wrap justify-center gap-3">
            <a href="{{ route('portfolio') }}"
                class="rounded-full px-5 py-2 text-sm font-medium transition {{ is_null($activeCategory) ? 'bg-amber-500 text-zinc-950' : 'border border-zinc-700 text-zinc-300 hover:border-zinc-500' }}">
                Все
            </a>
            @foreach ($categories as $key => $label)
                <a href="{{ route('portfolio', ['category' => $key]) }}"
                    class="rounded-full px-5 py-2 text-sm font-medium transition {{ $activeCategory === $key ? 'bg-amber-500 text-zinc-950' : 'border border-zinc-700 text-zinc-300 hover:border-zinc-500' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($works as $work)
                @include('partials.work-card', ['work' => $work])
            @empty
                <p class="text-zinc-500 sm:col-span-2 lg:col-span-3">В этой категории пока нет работ.</p>
            @endforelse
        </div>
    </section>
@endsection