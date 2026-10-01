@extends('layouts.admin')

@section('title', 'Manage Tours & Trips')
@section('header_title', 'Tour Catalog Management')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="font-display text-2xl font-bold text-forest-900">Bali Tours & Day Trips</h1>
            <a href="{{ route('admin.trips.create') }}" 
               class="px-4 py-2.5 rounded-xl bg-forest-900 hover:bg-forest-800 text-white text-xs font-semibold shadow-sm transition-colors">
                + Create New Tour Itinerary
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
                            <th class="p-4">Tour Name</th>
                            <th class="p-4">Category</th>
                            <th class="p-4">Duration & Area</th>
                            <th class="p-4">Starting Price</th>
                            <th class="p-4 text-center">Featured</th>
                            <th class="p-4 text-center">Status</th>
                            <th class="p-4 text-right whitespace-nowrap">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-sand-100">
                        @forelse($trips as $trip)
                            <tr class="hover:bg-cream-50 transition-colors">
                                <td class="p-4 flex items-center gap-3 min-w-[220px]">
                                    <img src="{{ $trip->hero_image_url }}" alt="{{ $trip->name }}" class="w-12 h-10 rounded-lg object-cover flex-shrink-0">
                                    <div>
                                        <span class="font-bold text-forest-900 block leading-tight">{{ $trip->name }}</span>
                                        <span class="text-xs text-sand-500">{{ $trip->destinations_count }} stops • {{ $trip->itineraries_count }} timeline steps</span>
                                    </div>
                                </td>
                                <td class="p-4 text-sand-700 text-xs whitespace-nowrap">{{ $trip->category ?: 'Day Tour' }}</td>
                                <td class="p-4 text-sand-700 text-xs whitespace-nowrap">
                                    <span class="font-semibold block text-forest-900">{{ $trip->duration ?: '—' }}</span>
                                    <span class="text-sand-500">{{ $trip->location ?: 'Bali' }}</span>
                                </td>
                                <td class="p-4 text-sand-900 font-bold text-xs whitespace-nowrap">
                                    {{ $trip->formatted_price }}
                                </td>
                                <td class="p-4 text-center whitespace-nowrap">
                                    <span class="px-2 py-0.5 rounded-full text-[11px] font-semibold {{ $trip->featured ? 'bg-amber-100 text-amber-800' : 'bg-sand-100 text-sand-600' }}">
                                        {{ $trip->featured ? '★ Featured' : 'Standard' }}
                                    </span>
                                </td>
                                <td class="p-4 text-center whitespace-nowrap">
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $trip->status ? 'bg-emerald-100 text-emerald-800' : 'bg-rose-100 text-rose-800' }}">
                                        {{ $trip->status ? 'Active' : 'Draft' }}
                                    </span>
                                </td>
                                <td class="p-4 text-right space-x-2 whitespace-nowrap">
                                    <a href="{{ route('trips.show', $trip->slug) }}" target="_blank" class="inline-block px-2.5 py-1 rounded-lg bg-sand-100 hover:bg-sand-200 text-xs font-semibold text-sand-700 transition-colors">
                                        View
                                    </a>
                                    <a href="{{ route('admin.trips.edit', $trip->id) }}" class="inline-block px-2.5 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-xs font-semibold text-emerald-700 transition-colors">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.trips.destroy', $trip->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this trip itinerary?')">
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
                                <td colspan="7" class="p-8 text-center text-sand-500">No tours found. Click "+ Create New Tour Itinerary" to add one.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            {{ $trips->links() }}
        </div>
    </div>
@endsection
