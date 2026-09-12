@extends('layouts.app')

@section('title', 'Форма заказа — MiniForge')

@section('content')
    <section class="mx-auto max-w-4xl px-4 py-16">
        <div class="mb-10 text-center">
            <h1 class="text-4xl font-black tracking-tight">Форма заказа</h1>
            <p class="mt-4 text-zinc-400">
                Загрузите файл модели и выберите опции — пришлём расчёт стоимости и сроков.
            </p>
        </div>

        @if (session('status'))
            <div class="mb-8 rounded-lg border border-emerald-500/40 bg-emerald-500/10 px-4 py-3 text-emerald-300">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('orders.store') }}" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <div class="space-y-4">
                <div>
                    <label for="name" class="mb-1 block text-sm font-medium text-zinc-300">Ваше имя</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required autocomplete="name"
                        class="w-full rounded-lg border border-zinc-700 bg-zinc-900 px-4 py-2.5 outline-none transition focus:border-amber-500">
                    @error('name')
                        <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="contact" class="mb-1 block text-sm font-medium text-zinc-300">
                        Контакты (телефон, Telegram или email)
                    </label>
                    <input type="text" name="contact" id="contact" value="{{ old('contact') }}" required
                        class="w-full rounded-lg border border-zinc-700 bg-zinc-900 px-4 py-2.5 outline-none transition focus:border-amber-500">
                    @error('contact')
                        <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <fieldset class="space-y-3">
                <legend class="mb-1 block text-sm font-medium text-zinc-300">Технология печати</legend>
                <div class="grid gap-3 sm:grid-cols-2">
                    <label class="cursor-pointer rounded-xl border p-4 transition has-[:checked]:border-amber-500 has-[:checked]:bg-amber-500/10 border-zinc-700">
                        <input type="radio" name="technology" value="resin" @checked(old('technology', 'resin') === 'resin') class="accent-amber-500">
                        <span class="mt-2 block font-semibold">Фотополимер</span>
                        <span class="block text-sm text-zinc-400">Максимальная детализация для миниатюр и бюстов.</span>
                    </label>
                    <label class="cursor-pointer rounded-xl border p-4 transition has-[:checked]:border-amber-500 has-[:checked]:bg-amber-500/10 border-zinc-700">
                        <input type="radio" name="technology" value="fdm" @checked(old('technology') === 'fdm') class="accent-amber-500">
                        <span class="mt-2 block font-semibold">FDM</span>
                        <span class="block text-sm text-zinc-400">Прочнее и дешевле — для террейна и крупных деталей.</span>
                    </label>
                </div>
                @error('technology')
                    <p class="text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </fieldset>

            <fieldset class="space-y-3">
                <legend class="mb-1 block text-sm font-medium text-zinc-300">Покрас</legend>
                <div class="grid gap-3 sm:grid-cols-3">
                    <label class="cursor-pointer rounded-xl border p-4 transition has-[:checked]:border-amber-500 has-[:checked]:bg-amber-500/10 border-zinc-700">
                        <input type="radio" name="painting" value="none" @checked(old('painting', 'none') === 'none') class="accent-amber-500">
                        <span class="mt-2 block font-semibold">Без покраса</span>
                        <span class="block text-sm text-zinc-400">Только печать и постобработка.</span>
                    </label>
                    <label class="cursor-pointer rounded-xl border p-4 transition has-[:checked]:border-amber-500 has-[:checked]:bg-amber-500/10 border-zinc-700">
                        <input type="radio" name="painting" value="simple" @checked(old('painting') === 'simple') class="accent-amber-500">
                        <span class="mt-2 block font-semibold">Tabletop</span>
                        <span class="block text-sm text-zinc-400">Быстрый столовый уровень.</span>
                    </label>
                    <label class="cursor-pointer rounded-xl border p-4 transition has-[:checked]:border-amber-500 has-[:checked]:bg-amber-500/10 border-zinc-700">
                        <input type="radio" name="painting" value="advanced" @checked(old('painting') === 'advanced') class="accent-amber-500">
                        <span class="mt-2 block font-semibold">Display</span>
                        <span class="block text-sm text-zinc-400">Выставочный уровень с NMM и OSL.</span>
                    </label>
                </div>
                @error('painting')
                    <p class="text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </fieldset>

            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label for="scale" class="mb-1 block text-sm font-medium text-zinc-300">Масштаб (необязательно)</label>
                    <input type="text" name="scale" id="scale" value="{{ old('scale') }}" placeholder="28 мм, 1:6, ..."
                        class="w-full rounded-lg border border-zinc-700 bg-zinc-900 px-4 py-2.5 outline-none transition focus:border-amber-500">
                    @error('scale')
                        <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-end pb-2">
                    <label class="flex items-center gap-3 text-sm text-zinc-300">
                        <input type="checkbox" name="assembly" value="1" @checked(old('assembly')) class="h-4 w-4 accent-amber-500">
                        Нужна сборка и подготовка к игре
                    </label>
                </div>
            </div>

            <div>
                <label for="file" class="mb-1 block text-sm font-medium text-zinc-300">Файл модели (STL / OBJ / 3MF, до 25 МБ)</label>
                <input type="file" name="file" id="file" accept=".stl,.obj,.3mf,.step,.stp,.zip"
                    class="w-full rounded-lg border border-zinc-700 bg-zinc-900 px-4 py-2.5 text-sm outline-none transition file:mr-4 file:rounded-lg file:border-0 file:bg-zinc-800 file:px-4 file:py-2 file:text-zinc-200 hover:file:bg-zinc-700 focus:border-amber-500">
                <p class="mt-1 text-xs text-zinc-500">Не знаете формат или файл больше — пришлёте ссылку в комментарии.</p>
                @error('file')
                    <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="comment" class="mb-1 block text-sm font-medium text-zinc-300">Комментарий к заказу</label>
                <textarea name="comment" id="comment" rows="4"
                    class="w-full rounded-lg border border-zinc-700 bg-zinc-900 px-4 py-2.5 outline-none transition focus:border-amber-500">{{ old('comment') }}</textarea>
                @error('comment')
                    <p class="mt-1 text-sm text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full rounded-lg bg-amber-500 px-6 py-3 font-semibold text-zinc-950 transition hover:bg-amber-400">
                Отправить заявку на расчёт
            </button>
        </form>
    </section>
@endsection