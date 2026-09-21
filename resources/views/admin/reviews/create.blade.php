@extends('layouts.admin')

@section('title', 'Add Customer Review')
@section('header_title', 'Create Review')

@section('content')
    <div class="max-w-2xl space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="font-display text-2xl font-bold text-forest-900">Add Customer Review</h1>
            <a href="{{ route('admin.reviews.index') }}" class="text-xs font-semibold text-sand-600 hover:underline">
                ← Back to Reviews
            </a>
        </div>

        <form action="{{ route('admin.reviews.store') }}" method="POST" class="bg-white p-8 rounded-2xl border border-sand-200 shadow-sm space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="customer_name" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Customer Name *</label>
                    <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}" required 
                           class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                </div>

                <div>
                    <label for="country" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Country</label>
                    <input type="text" name="country" id="country" value="{{ old('country') }}" placeholder="e.g. Australia, Singapore"
                           class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                </div>

                <div>
                    <label for="rating" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Star Rating (1 - 5) *</label>
                    <select name="rating" id="rating" required class="w-full rounded-xl border-sand-300 text-sm">
                        <option value="5" selected>★★★★★ (5 Stars)</option>
                        <option value="4">★★★★☆ (4 Stars)</option>
                        <option value="3">★★★☆☆ (3 Stars)</option>
                        <option value="2">★★☆☆☆ (2 Stars)</option>
                        <option value="1">★☆☆☆☆ (1 Star)</option>
                    </select>
                </div>

                <div>
                    <label for="driver_id" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Associated Driver (Optional)</label>
                    <select name="driver_id" id="driver_id" class="w-full rounded-xl border-sand-300 text-sm">
                        <option value="">None / General Review</option>
                        @foreach($drivers as $d)
                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="sm:col-span-2">
                    <label for="trip_id" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Associated Tour (Optional)</label>
                    <select name="trip_id" id="trip_id" class="w-full rounded-xl border-sand-300 text-sm">
                        <option value="">None / General Review</option>
                        @foreach($trips as $t)
                            <option value="{{ $t->id }}">{{ $t->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label for="review" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Customer Review Text *</label>
                <textarea name="review" id="review" rows="4" required 
                          class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">{{ old('review') }}</textarea>
            </div>

            <div class="flex items-center gap-6 pt-2">
                <label class="flex items-center gap-2 cursor-pointer text-sm text-sand-800">
                    <input type="checkbox" name="status" value="1" {{ old('status', true) ? 'checked' : '' }}
                           class="rounded text-emerald-600 focus:ring-emerald-500 border-sand-300">
                    <span class="font-semibold">Published</span>
                </label>

                <label class="flex items-center gap-2 cursor-pointer text-sm text-sand-800">
                    <input type="checkbox" name="featured" value="1" {{ old('featured', true) ? 'checked' : '' }}
                           class="rounded text-amber-500 focus:ring-amber-400 border-sand-300">
                    <span class="font-semibold text-amber-800">Feature on Homepage</span>
                </label>
            </div>

            <div class="pt-4 border-t border-sand-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.reviews.index') }}" class="px-5 py-2.5 rounded-xl bg-sand-100 hover:bg-sand-200 text-sand-800 text-xs font-semibold">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-semibold shadow-md">
                    Save Review
                </button>
            </div>
        </form>
    </div>
@endsection
