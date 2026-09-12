@extends('layouts.app')

@section('title', 'MiniForge — 3D-печать и покрас миниатюр')

@section('content')
    <section class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 via-zinc-950 to-zinc-950"></div>
        <div class="relative mx-auto max-w-6xl px-4 pb-24 pt-20 text-center">
            <p class="mb-4 inline-block rounded-full border border-amber-500/40 bg-amber-500/10 px-4 py-1 text-sm text-amber-400">
                Фотополимер и FDM, покрас до уровня Display
            </p>
            <h1 class="mx-auto max-w-3xl text-4xl font-black leading-tight tracking-tight md:text-6xl">
                Чипим ваши идеи в прочный пластик и стеклянный лак
            </h1>
            <p class="mx-auto mt-6 max-w-2xl text-lg text-zinc-400">
                Печатаем миниатюры, бюсты и террейн для настольных игр. Красим, собираем
                и бережно доставляем хрупкие модели по всей стране.
            </p>
            <div class="mt-10 flex flex-wrap items-center justify-center gap-4">
                <a href="{{ route('order.create') }}"
                    class="rounded-lg bg-amber-500 px-6 py-3 font-semibold text-zinc-950 transition hover:bg-amber-400">
                    Рассчитать заказ
                </a>
                <a href="{{ route('portfolio') }}"
                    class="rounded-lg border border-zinc-700 px-6 py-3 font-semibold text-zinc-200 transition hover:border-zinc-500">
                    Смотреть работы
                </a>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-6xl px-4 py-16">
        <div class="mb-10 text-center">
            <h2 class="text-3xl font-bold">FDM или фотополимер — что подойдёт вам?</h2>
            <p class="mt-3 text-zinc-400">Выбирайте технологию под задачу: от подробной миниатюры до крупного террейна.</p>
        </div>
        <div class="grid gap-6 md:grid-cols-2">
            <div class="rounded-xl border border-zinc-800 bg-zinc-900 p-8">
                <h3 class="text-xl font-bold text-amber-400">Фотополимер (DLP / SLA)</h3>
                <ul class="mt-4 space-y-3 text-sm leading-relaxed text-zinc-300">
                    <li>Детализация до 3–10 микрон — идеально для лиц, мелких элементов и оверсайзов.</li>
                    <li>Гладкая поверхность, минимум слоёв, готовность к покрасу.</li>
                    <li>Подходит для миниатюр 28–54 мм, бюстов и высокодетализированных деталей.</li>
                    <li>Требует аккуратного обращения и защитного покрытия.</li>
                </ul>
            </div>
            <div class="rounded-xl border border-zinc-800 bg-zinc-900 p-8">
                <h3 class="text-xl font-bold text-amber-400">FDM</h3>
                <ul class="mt-4 space-y-3 text-sm leading-relaxed text-zinc-300">
                    <li>Прочность и скорость — отлично для игрового террейна и функциональных деталей.</li>
                    <li>Слой 0.08–0.2 мм, террейн «под камень» часто красивее фотополимера.</li>
                    <li>Крупные объекты до 40 см без склейки модулей.</li>
                    <li>Низкая стоимость грамма — экономично для больших заказов.</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-6xl px-4 py-16">
        <div class="mb-10 text-center">
            <h2 class="text-3xl font-bold">Последние работы</h2>
            <p class="mt-3 text-zinc-400">Пролистайте карусель и загляните в портфолио за категориями.</p>
        </div>
        <div class="-mx-4 flex snap-x snap-mandatory gap-6 overflow-x-auto px-4 pb-4">
            @foreach ($works as $work)
                <div class="w-72 flex-shrink-0 snap-start">
                    @include('partials.work-card', ['work' => $work])
                </div>
            @endforeach
        </div>
    </section>

    <section class="mx-auto max-w-6xl px-4 py-16">
        <div class="mb-10 text-center">
            <h2 class="text-3xl font-bold">Как проходит заказ</h2>
        </div>
        <ol class="grid gap-6 md:grid-cols-4">
            @foreach ($steps as $step)
                <li class="rounded-xl border border-zinc-800 bg-zinc-900 p-6">
                    <span class="text-3xl font-black text-amber-500/70">0{{ $loop->iteration }}</span>
                    <h3 class="mt-3 font-semibold">{{ $step['title'] }}</h3>
                    <p class="mt-2 text-sm leading-relaxed text-zinc-400">{{ $step['text'] }}</p>
                </li>
            @endforeach
        </ol>
    </section>
@endsection