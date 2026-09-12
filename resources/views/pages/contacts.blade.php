@extends('layouts.app')

@section('title', 'Контакты — MiniForge')

@section('content')
    <section class="mx-auto max-w-4xl px-4 py-16">
        <div class="mb-12 text-center">
            <h1 class="text-4xl font-black tracking-tight">Контакты</h1>
            <p class="mt-4 text-zinc-400">Пишите в любой из мессенджеров — отвечаем обычно в течение часа в рабочее время.</p>
        </div>

        <div class="grid gap-6 md:grid-cols-3">
            <a href="https://t.me/miniforge" target="_blank" rel="noopener"
                class="group rounded-xl border border-zinc-800 bg-zinc-900 p-6 transition hover:border-amber-500">
                <span class="block text-2xl font-bold text-amber-400">Telegram</span>
                <span class="mt-1 block text-sm text-zinc-400 group-hover:text-zinc-300">@miniforge</span>
            </a>
            <a href="https://wa.me/70000000000" target="_blank" rel="noopener"
                class="group rounded-xl border border-zinc-800 bg-zinc-900 p-6 transition hover:border-amber-500">
                <span class="block text-2xl font-bold text-amber-400">WhatsApp</span>
                <span class="mt-1 block text-sm text-zinc-400 group-hover:text-zinc-300">+7 000 000-00-00</span>
            </a>
            <a href="mailto:hello@miniforge.example" target="_blank" rel="noopener"
                class="group rounded-xl border border-zinc-800 bg-zinc-900 p-6 transition hover:border-amber-500">
                <span class="block text-2xl font-bold text-amber-400">Email</span>
                <span class="mt-1 block text-sm text-zinc-400 group-hover:text-zinc-300">hello@miniforge.example</span>
            </a>
        </div>

        <div class="mt-10 rounded-xl border border-zinc-800 bg-zinc-900 p-6 text-sm text-zinc-400">
            <p class="font-semibold text-zinc-200">Самовывоз в Санкт-Петербурге — по договорённости.</p>
            <p class="mt-1">Можно подъехать, посмотреть на модели вживую и забрать заказ без доставки.</p>
        </div>
    </section>
@endsection