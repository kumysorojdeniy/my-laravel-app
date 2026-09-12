<article class="overflow-hidden rounded-xl border border-zinc-800 bg-zinc-900">
    @if ($work['image'] !== null)
        <img src="{{ $work['image'] }}" alt="{{ $work['title'] }}" class="h-40 w-full object-cover">
    @else
        <div class="flex h-40 items-center justify-center bg-gradient-to-br {{ $work['tone'] }} p-4">
            <span class="text-5xl font-black text-white/25">{{ mb_strtoupper(mb_substr($work['title'], 0, 1)) }}</span>
        </div>
    @endif
    <div class="space-y-2 p-4">
        <span class="inline-block rounded-full bg-zinc-800 px-2.5 py-0.5 text-xs text-amber-400">{{ $work['categoryLabel'] }}</span>
        <h3 class="font-semibold text-white">{{ $work['title'] }}</h3>
        <p class="text-sm leading-relaxed text-zinc-400">{{ $work['description'] }}</p>
    </div>
</article>