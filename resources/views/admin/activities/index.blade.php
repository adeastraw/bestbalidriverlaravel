@extends('layouts.admin')

@section('title', 'Manage Activities')
@section('header_title', 'Tourist Activities Management')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="font-display text-2xl font-bold text-forest-900">Bali Activities</h1>
            <a href="{{ route('admin.activities.create') }}" 
               class="px-4 py-2.5 rounded-xl bg-forest-900 hover:bg-forest-800 text-white text-xs font-semibold shadow-sm transition-colors">
                + Add New Activity
            </a>
        </div>

        <div class="bg-white rounded-2xl border border-sand-200 shadow-sm overflow-hidden">
            <table class="w-full text-left text-sm">
                <thead class="bg-sand-50 border-b border-sand-200 text-xs font-semibold text-sand-600 uppercase tracking-wider">
                    <tr>
                        <th class="p-4">Activity</th>
                        <th class="p-4">Location</th>
                        <th class="p-4">Duration</th>
                        <th class="p-4">Price</th>
                        <th class="p-4 text-center">Status</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-sand-100">
                    @forelse($activities as $act)
                        <tr class="hover:bg-cream-50 transition-colors">
                            <td class="p-4 flex items-center gap-3">
                                <img src="{{ $act->image_url }}" alt="{{ $act->name }}" class="w-12 h-10 rounded-lg object-cover">
                                <span class="font-bold text-forest-900">{{ $act->name }}</span>
                            </td>
                            <td class="p-4 text-sand-700 text-xs">{{ $act->location ?: 'Bali' }}</td>
                            <td class="p-4 text-sand-700 text-xs">{{ $act->duration ?: '—' }}</td>
                            <td class="p-4 text-sand-900 font-bold text-xs">
                                {{ $act->formatted_price }}
                            </td>
                            <td class="p-4 text-center">
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $act->status ? 'bg-emerald-100 text-emerald-800' : 'bg-rose-100 text-rose-800' }}">
                                    {{ $act->status ? 'Active' : 'Hidden' }}
                                </span>
                            </td>
                            <td class="p-4 text-right space-x-2">
                                <a href="{{ route('admin.activities.edit', $act->id) }}" class="text-xs font-semibold text-emerald-700 hover:underline">
                                    Edit
                                </a>
                                <form action="{{ route('admin.activities.destroy', $act->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this activity?')">
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
                            <td colspan="6" class="p-8 text-center text-sand-500">No activities found. Click "+ Add New Activity" to create one.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div>
            {{ $activities->links() }}
        </div>
    </div>
@endsection
