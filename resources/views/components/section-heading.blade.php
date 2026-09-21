@props([
    'badge' => null,
    'title' => '',
    'subtitle' => null,
    'center' => true,
])

<div class="{{ $center ? 'text-center mx-auto' : '' }} max-w-3xl mb-12">
    @if($badge)
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-forest-100 text-forest-800 text-xs font-semibold tracking-wider uppercase mb-3">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
            {{ $badge }}
        </span>
    @endif
    
    <h2 class="font-display text-3xl sm:text-4xl font-bold text-forest-900 leading-tight">
        {{ $title }}
    </h2>

    @if($subtitle)
        <p class="mt-3 text-base sm:text-lg text-sand-800/80 leading-relaxed font-normal">
            {{ $subtitle }}
        </p>
    @endif
</div>
