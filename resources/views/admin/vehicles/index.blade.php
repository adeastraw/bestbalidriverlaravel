@extends('layouts.admin')

@section('title', 'Manage Vehicles')
@section('header_title', 'Vehicle Fleet Management')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="font-display text-2xl font-bold text-forest-900">Fleet Vehicles</h1>
            <a href="{{ route('admin.vehicles.create') }}" 
               class="px-4 py-2.5 rounded-xl bg-forest-900 hover:bg-forest-800 text-white text-xs font-semibold shadow-sm transition-colors">
                + Add New Vehicle
            </a>
        </div>

        <div class="bg-white rounded-2xl border border-sand-200 shadow-sm overflow-hidden">
            <table class="w-full text-left text-sm">
                <thead class="bg-sand-50 border-b border-sand-200 text-xs font-semibold text-sand-600 uppercase tracking-wider">
                    <tr>
                        <th class="p-4">Vehicle</th>
                        <th class="p-4">Type</th>
                        <th class="p-4">Capacity</th>
                        <th class="p-4">Gallery Images</th>
                        <th class="p-4 text-center">Status</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-sand-100">
                    @forelse($vehicles as $vehicle)
                        <tr class="hover:bg-cream-50 transition-colors">
                            <td class="p-4 flex items-center gap-3">
                                <img src="{{ $vehicle->photo_url }}" alt="{{ $vehicle->name }}" class="w-12 h-9 rounded-lg object-cover">
                                <span class="font-bold text-forest-900">{{ $vehicle->name }}</span>
                            </td>
                            <td class="p-4 text-sand-700">{{ $vehicle->type ?: '—' }}</td>
                            <td class="p-4 text-sand-700 text-xs">
                                Up to {{ $vehicle->capacity }} seats ({{ $vehicle->luggage_capacity ?: '0' }} luggage)
                            </td>
                            <td class="p-4 text-sand-700 text-xs">
                                {{ $vehicle->images_count }} photos
                            </td>
                            <td class="p-4 text-center">
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $vehicle->status ? 'bg-emerald-100 text-emerald-800' : 'bg-rose-100 text-rose-800' }}">
                                    {{ $vehicle->status ? 'Active' : 'Hidden' }}
                                </span>
                            </td>
                            <td class="p-4 text-right space-x-2">
                                <a href="{{ route('admin.vehicles.edit', $vehicle->id) }}" class="text-xs font-semibold text-emerald-700 hover:underline">
                                    Edit
                                </a>
                                <form action="{{ route('admin.vehicles.destroy', $vehicle->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this vehicle?')">
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
                            <td colspan="6" class="p-8 text-center text-sand-500">No vehicles found. Click "+ Add New Vehicle" to add one.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div>
            {{ $vehicles->links() }}
        </div>
    </div>
@endsection
