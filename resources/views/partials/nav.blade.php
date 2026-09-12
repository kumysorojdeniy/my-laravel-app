<nav class="sticky top-0 z-50 border-b border-zinc-800/80 bg-zinc-950/90 backdrop-blur">
    <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4">
        <a href="{{ route('home') }}" class="text-lg font-bold tracking-tight">
            <span class="text-amber-400">Mini</span>Forge
        </a>

        <ul class="hidden items-center gap-6 text-sm text-zinc-300 md:flex">
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-amber-400' : 'hover:text-white' }}">Главная</a></li>
            <li><a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'text-amber-400' : 'hover:text-white' }}">Услуги и цены</a></li>
            <li><a href="{{ route('portfolio') }}" class="{{ request()->routeIs('portfolio') ? 'text-amber-400' : 'hover:text-white' }}">Портфолио</a></li>
            <li><a href="{{ route('terms') }}" class="{{ request()->routeIs('terms') ? 'text-amber-400' : 'hover:text-white' }}">Условия</a></li>
            <li><a href="{{ route('contacts') }}" class="{{ request()->routeIs('contacts') ? 'text-amber-400' : 'hover:text-white' }}">Контакты</a></li>
        </ul>

        <a href="{{ route('order.create') }}"
            class="rounded-lg bg-amber-500 px-4 py-2 text-sm font-semibold text-zinc-950 transition hover:bg-amber-400">
            Оформить заказ
        </a>
    </div>
</nav>