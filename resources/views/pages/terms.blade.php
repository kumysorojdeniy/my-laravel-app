@extends('layouts.app')

@section('title', 'Условия работы — MiniForge')

@section('content')
    <section class="mx-auto max-w-4xl px-4 py-16">
        <div class="mb-12 text-center">
            <h1 class="text-4xl font-black tracking-tight">Условия работы и FAQ</h1>
        </div>

        <div class="space-y-10">
            <section>
                <h2 class="mb-4 text-2xl font-bold">Условия работы</h2>
                <div class="space-y-4 rounded-xl border border-zinc-800 bg-zinc-900 p-6 text-sm leading-relaxed text-zinc-300">
                    <p>
                        <span class="font-semibold text-white">Предоплата — 50%.</span>
                        Остаток — перед отправкой. После согласования сметы фиксируем стоимость и сроки.
                    </p>
                    <p>
                        <span class="font-semibold text-white">Оценка файла — бесплатно.</span>
                        Если пришлёте готовую модель, проверим её на ошибки сетки и предупредим о рисках печати.
                    </p>
                    <p>
                        <span class="font-semibold text-white">Правки в размерах</span>
                        возможны до запуска печати. Внесение изменений в геометрию может добавить время и стоимость.
                    </p>
                    <p>
                        <span class="font-semibold text-white">Изменение по договорённости.</span>
                        Если в процессе станет ясно, что модель требует другого подхода, свяжемся до начала работ.
                    </p>
                </div>
            </section>

            <section>
                <h2 class="mb-4 text-2xl font-bold">Доставка хрупких миниатюр</h2>
                <div class="grid gap-4 md:grid-cols-3">
                    <div class="rounded-xl border border-zinc-800 bg-zinc-900 p-6">
                        <h3 class="font-semibold text-amber-400">Упаковка</h3>
                        <p class="mt-2 text-sm text-zinc-400">Пузырчатая плёнка, обмотка, коробка с запасом — миниатюры не болтаются.</p>
                    </div>
                    <div class="rounded-xl border border-zinc-800 bg-zinc-900 p-6">
                        <h3 class="font-semibold text-amber-400">Отправка</h3>
                        <p class="mt-2 text-sm text-zinc-400">СДЭК, Почта России или курьер. Застрахуем ценную отправку по запросу.</p>
                    </div>
                    <div class="rounded-xl border border-zinc-800 bg-zinc-900 p-6">
                        <h3 class="font-semibold text-amber-400">Фото перед отправкой</h3>
                        <p class="mt-2 text-sm text-zinc-400">Присылаем снимки в упаковке — вы видите, что уехало именно то, что заказали.</p>
                    </div>
                </div>
            </section>

            <section>
                <h2 class="mb-4 text-2xl font-bold">Частые вопросы</h2>
                <div class="space-y-3">
                    <details class="group rounded-xl border border-zinc-800 bg-zinc-900">
                        <summary class="cursor-pointer list-none px-5 py-4 font-medium transition hover:text-amber-400">
                            Сколько занимает печать и покрас?
                        </summary>
                        <p class="px-5 pb-4 text-sm text-zinc-400">
                            Миниатюра 28–32 мм — от 2–3 дней. Партия 30–50 моделей на покрас — 2–4 недели.
                            Точный срок закладываем в смету.
                        </p>
                    </details>
                    <details class="group rounded-xl border border-zinc-800 bg-zinc-900">
                        <summary class="cursor-pointer list-none px-5 py-4 font-medium transition hover:text-amber-400">
                            Можно ли прислать модель без файла?
                        </summary>
                        <p class="px-5 pb-4 text-sm text-zinc-400">
                            Да. Пришлите фото или опишите задачу — отмоделируем по референсу, либо найдём и подготовим
                            подходящий STL.
                        </p>
                    </details>
                    <details class="group rounded-xl border border-zinc-800 bg-zinc-900">
                        <summary class="cursor-pointer list-none px-5 py-4 font-medium transition hover:text-amber-400">
                            Что делать, если миниатюра разбилась при доставке?
                        </summary>
                        <p class="px-5 pb-4 text-sm text-zinc-400">
                            Пришлите фото сразу после получения — восстановим модель или перепечатаем за наш счёт.
                        </p>
                    </details>
                    <details class="group rounded-xl border border-zinc-800 bg-zinc-900">
                        <summary class="cursor-pointer list-none px-5 py-4 font-medium transition hover:text-amber-400">
                            Даёте ли гарантию на покрас?
                        </summary>
                        <p class="px-5 pb-4 text-sm text-zinc-400">
                            Да, 30 дней после получения. Если краска пострадала в процессе игры — подкрасим бесплатно.
                        </p>
                    </details>
                </div>
            </section>
        </div>
    </section>
@endsection