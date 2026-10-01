@extends('layouts.admin')

@section('title', 'Customer Reviews')
@section('header_title', 'Reviews Moderation')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="font-display text-2xl font-bold text-forest-900">Traveler Reviews</h1>
            <a href="{{ route('admin.reviews.create') }}" 
               class="px-4 py-2.5 rounded-xl bg-forest-900 hover:bg-forest-800 text-white text-xs font-semibold shadow-sm transition-colors">
                + Add Review
            </a>
        </div>

        <div class="bg-white rounded-2xl border border-sand-200 shadow-sm overflow-hidden">
            <!-- Mobile Swipe Hint -->
            <div class="sm:hidden px-4 py-2 bg-sand-50/90 border-b border-sand-200/80 text-[11px] text-sand-600 flex items-center justify-between">
                <span class="flex items-center gap-1.5 font-medium">
                    <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                    </svg>
                    Geser tabel ke kanan untuk melihat & mengedit aksi
                </span>
                <span class="text-sand-400 text-[10px] font-semibold uppercase">Swipe →</span>
            </div>

            <div class="overflow-x-auto w-full">
                <table class="w-full text-left text-sm min-w-[720px]">
                    <thead class="bg-sand-50 border-b border-sand-200 text-xs font-semibold text-sand-600 uppercase tracking-wider">
                        <tr>
                            <th class="p-4">Customer</th>
                            <th class="p-4">Rating</th>
                            <th class="p-4">Review Content</th>
                            <th class="p-4">Driver / Tour</th>
                            <th class="p-4 text-center">Featured</th>
                            <th class="p-4 text-right whitespace-nowrap">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-sand-100">
                        @forelse($reviews as $rev)
                            <tr class="hover:bg-cream-50 transition-colors">
                                <td class="p-4 min-w-[200px]">
                                    <div class="flex items-center gap-3">
                                        @if($rev->image)
                                            <a href="{{ $rev->image_url }}" target="_blank" title="View Full Photo" class="flex-shrink-0 group relative">
                                                <img src="{{ $rev->image_url }}" alt="{{ $rev->customer_name }}" class="w-12 h-10 rounded-lg object-cover border border-sand-300 shadow-2xs group-hover:opacity-90 transition-opacity">
                                                <span class="absolute -top-1 -right-1 w-3.5 h-3.5 bg-emerald-600 rounded-full border-2 border-white flex items-center justify-center text-[8px] text-white">✓</span>
                                            </a>
                                        @else
                                            <img src="{{ $rev->image_url }}" alt="{{ $rev->customer_name }}" class="w-9 h-9 rounded-full object-cover border border-sand-200 flex-shrink-0">
                                        @endif
                                        <div>
                                            <span class="font-bold text-forest-900 block leading-tight">{{ $rev->customer_name }}</span>
                                            <div class="flex items-center gap-1.5 mt-0.5">
                                                <span class="text-xs text-sand-500">{{ $rev->country ?: 'Verified Guest' }}</span>
                                                @if($rev->image)
                                                    <span class="inline-flex items-center gap-0.5 text-[9px] font-bold text-emerald-800 bg-emerald-100/80 px-1.5 py-0.5 rounded">
                                                        📷 Photo
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4 text-amber-500 text-xs font-bold whitespace-nowrap">
                                    {{ str_repeat('★', $rev->rating) }}
                                </td>
                                <td class="p-4 text-sand-800 text-xs min-w-[200px] max-w-sm">
                                    <p class="line-clamp-2">"{{ $rev->review }}"</p>
                                </td>
                                <td class="p-4 text-xs text-sand-600 whitespace-nowrap">
                                    @if($rev->driver)
                                        <span class="block">Driver: <strong>{{ $rev->driver->name }}</strong></span>
                                    @endif
                                    @if($rev->trip)
                                        <span class="block">Tour: <strong>{{ $rev->trip->name }}</strong></span>
                                    @endif
                                </td>
                                <td class="p-4 text-center whitespace-nowrap">
                                    <span class="px-2 py-0.5 rounded-full text-[11px] font-semibold {{ $rev->featured ? 'bg-amber-100 text-amber-800' : 'bg-sand-100 text-sand-600' }}">
                                        {{ $rev->featured ? '★ Featured' : 'Normal' }}
                                    </span>
                                </td>
                                <td class="p-4 text-right space-x-2 whitespace-nowrap">
                                    <a href="{{ route('admin.reviews.edit', $rev->id) }}" class="inline-block px-2.5 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-xs font-semibold text-emerald-700 transition-colors">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.reviews.destroy', $rev->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this review?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2.5 py-1 rounded-lg bg-rose-50 hover:bg-rose-100 text-xs font-semibold text-rose-600 transition-colors">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-8 text-center text-sand-500">No reviews found. Click "+ Add Review" to add one.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            {{ $reviews->links() }}
        </div>
    </div>
@endsection
