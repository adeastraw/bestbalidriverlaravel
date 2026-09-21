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
            <table class="w-full text-left text-sm">
                <thead class="bg-sand-50 border-b border-sand-200 text-xs font-semibold text-sand-600 uppercase tracking-wider">
                    <tr>
                        <th class="p-4">Customer</th>
                        <th class="p-4">Rating</th>
                        <th class="p-4">Review Content</th>
                        <th class="p-4">Driver / Tour</th>
                        <th class="p-4 text-center">Featured</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-sand-100">
                    @forelse($reviews as $rev)
                        <tr class="hover:bg-cream-50 transition-colors">
                            <td class="p-4">
                                <span class="font-bold text-forest-900 block leading-tight">{{ $rev->customer_name }}</span>
                                <span class="text-xs text-sand-500">{{ $rev->country ?: 'Verified Guest' }}</span>
                            </td>
                            <td class="p-4 text-amber-500 text-xs font-bold whitespace-nowrap">
                                {{ str_repeat('★', $rev->rating) }}
                            </td>
                            <td class="p-4 text-sand-800 text-xs max-w-sm">
                                <p class="line-clamp-2">"{{ $rev->review }}"</p>
                            </td>
                            <td class="p-4 text-xs text-sand-600">
                                @if($rev->driver)
                                    <span class="block">Driver: <strong>{{ $rev->driver->name }}</strong></span>
                                @endif
                                @if($rev->trip)
                                    <span class="block">Tour: <strong>{{ $rev->trip->name }}</strong></span>
                                @endif
                            </td>
                            <td class="p-4 text-center">
                                <span class="px-2 py-0.5 rounded-full text-[11px] font-semibold {{ $rev->featured ? 'bg-amber-100 text-amber-800' : 'bg-sand-100 text-sand-600' }}">
                                    {{ $rev->featured ? '★ Featured' : 'Normal' }}
                                </span>
                            </td>
                            <td class="p-4 text-right space-x-2">
                                <a href="{{ route('admin.reviews.edit', $rev->id) }}" class="text-xs font-semibold text-emerald-700 hover:underline">
                                    Edit
                                </a>
                                <form action="{{ route('admin.reviews.destroy', $rev->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this review?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-semibold text-rose-600 hover:underline">
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

        <div>
            {{ $reviews->links() }}
        </div>
    </div>
@endsection
