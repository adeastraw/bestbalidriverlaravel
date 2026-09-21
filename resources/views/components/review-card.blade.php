@props(['review'])

<div class="bg-white rounded-2xl p-6 border border-sand-200/80 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
    <div>
        <!-- Star Rating -->
        <div class="flex items-center gap-1 text-amber-400 mb-4">
            @for($i = 1; $i <= 5; $i++)
                <svg class="w-4 h-4 {{ $i <= $review->rating ? 'fill-current' : 'text-sand-200' }}" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
            @endfor
        </div>

        <p class="text-sm text-sand-800 leading-relaxed italic">
            “{{ $review->review }}”
        </p>
    </div>

    <div class="mt-6 pt-4 border-t border-sand-100 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <img src="{{ $review->image_url }}" alt="{{ $review->customer_name }}" class="w-9 h-9 rounded-full object-cover border border-sand-200">
            <div>
                <span class="text-sm font-bold text-forest-900 block leading-tight">
                    {{ $review->customer_name }}
                </span>
                <span class="text-xs text-sand-500 block">
                    {{ $review->country ?: 'Verified Traveler' }}
                </span>
            </div>
        </div>

        @if($review->driver)
            <span class="text-[11px] bg-forest-50 text-forest-800 px-2.5 py-1 rounded-full font-medium">
                Driver: {{ $review->driver->name }}
            </span>
        @endif
    </div>
</div>
