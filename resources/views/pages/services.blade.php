@extends('layouts.app')

@section('title', 'Услуги и цены — MiniForge')

@section('content')
    <section class="mx-auto max-w-6xl px-4 py-16">
        <div class="mb-12 text-center">
            <h1 class="text-4xl font-black tracking-tight">Услуги и прайс-лист</h1>
            <p class="mx-auto mt-4 max-w-2xl text-zinc-400">
                Итоговая стоимость считается после оценки файла: сложность, размеры и тираж.
                Точную смету присылаем в течение рабочего дня.
            </p>
        </div>

        <div class="space-y-12">
            @foreach ($groups as $group)
                <section id="{{ $group['slug'] }}">
                    <div class="mb-4">
                        <h2 class="text-2xl font-bold">{{ $group['title'] }}</h2>
                        <p class="mt-1 max-w-3xl text-sm text-zinc-400">{{ $group['description'] }}</p>
                    </div>
                    <div class="overflow-hidden rounded-xl border border-zinc-800">
                        <table class="w-full text-left text-sm">
                            <thead class="bg-zinc-900 text-zinc-300">
                                <tr>
                                    <th class="px-4 py-3 font-medium">Услуга</th>
                                    <th class="w-48 px-4 py-3 font-medium">Цена</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-zinc-800 bg-zinc-950/60">
                                @foreach ($group['items'] as $item)
                                    <tr>
                                        <td class="px-4 py-3 text-zinc-300">{{ $item['name'] }}</td>
                                        <td class="px-4 py-3 font-semibold text-amber-400">{{ $item['price'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            @endforeach
        </div>
    </section>
@endsection