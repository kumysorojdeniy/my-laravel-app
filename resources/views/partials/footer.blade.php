<footer class="border-t border-zinc-800/80 bg-zinc-950">
    <div class="mx-auto flex max-w-6xl flex-col items-center justify-between gap-4 px-4 py-10 text-sm text-zinc-400 md:flex-row">
        <p>&copy; {{ date('Y') }} MiniForge. 3D-печать и покрас миниатюр на заказ.</p>
        <nav class="flex gap-6">
            <a href="{{ route('services') }}" class="hover:text-white">Услуги</a>
            <a href="{{ route('portfolio') }}" class="hover:text-white">Портфолио</a>
            <a href="{{ route('terms') }}" class="hover:text-white">Условия</a>
            <a href="{{ route('contacts') }}" class="hover:text-white">Контакты</a>
        </nav>
    </div>
</footer>