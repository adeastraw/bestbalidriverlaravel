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

        <form action="{{ route('admin.reviews.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-2xl border border-sand-200 shadow-sm space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="customer_name" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Customer Name *</label>
                    <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}" required 
                           placeholder="e.g. Sarah & Mark Jenkins"
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
                            <option value="{{ $d->id }}" {{ old('driver_id') == $d->id ? 'selected' : '' }}>{{ $d->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="sm:col-span-2">
                    <label for="trip_id" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Associated Tour (Optional)</label>
                    <select name="trip_id" id="trip_id" class="w-full rounded-xl border-sand-300 text-sm">
                        <option value="">None / General Review</option>
                        @foreach($trips as $t)
                            <option value="{{ $t->id }}" {{ old('trip_id') == $t->id ? 'selected' : '' }}>{{ $t->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label for="review" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Customer Review Text *</label>
                <textarea name="review" id="review" rows="4" required placeholder="Tuliskan pengalaman ulasan traveler..."
                          class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">{{ old('review') }}</textarea>
            </div>

            <!-- Photo Upload with Live Preview -->
            <div x-data="{
                previewUrl: null,
                fileName: '',
                handleFileChange(event) {
                    const file = event.target.files[0];
                    if (file) {
                        this.fileName = file.name;
                        this.previewUrl = URL.createObjectURL(file);
                    } else {
                        this.previewUrl = null;
                        this.fileName = '';
                    }
                },
                clearFile() {
                    this.previewUrl = null;
                    this.fileName = '';
                    this.$refs.fileInput.value = '';
                }
            }" class="space-y-2">
                <label class="block text-xs font-bold text-sand-700 uppercase tracking-wider">
                    Traveler Photo / Documentation (Opsional)
                </label>
                <p class="text-xs text-sand-500">
                    Upload foto momen liburan wisatawan (bersama driver, di pura/waterfall, atau suasana tur) agar ulasan terlihat nyata dan kredibel.
                </p>

                <div class="mt-2 border-2 border-dashed border-sand-300 hover:border-emerald-500 rounded-2xl p-4 transition-colors bg-sand-50/50">
                    <div x-show="!previewUrl" class="text-center py-6">
                        <div class="w-12 h-12 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <label for="image" class="cursor-pointer text-sm font-semibold text-emerald-700 hover:text-emerald-800 underline">
                            <span>Pilih foto dari perangkat</span>
                            <input type="file" name="image" id="image" x-ref="fileInput" @change="handleFileChange" accept="image/png,image/jpeg,image/jpg,image/webp" class="sr-only">
                        </label>
                        <p class="text-[11px] text-sand-500 mt-1">Format: JPG, JPEG, PNG, atau WebP (Maksimal 5MB)</p>
                    </div>

                    <div x-show="previewUrl" x-cloak class="flex flex-col sm:flex-row items-center gap-4">
                        <div class="relative w-36 h-28 rounded-xl overflow-hidden bg-sand-200 border border-sand-300 flex-shrink-0 shadow-xs">
                            <img :src="previewUrl" alt="Preview Foto" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-grow space-y-1 text-center sm:text-left">
                            <div class="text-xs font-semibold text-forest-900 truncate max-w-xs" x-text="fileName"></div>
                            <div class="text-[11px] text-emerald-600 font-medium">Foto siap disimpan bersama ulasan</div>
                            <button type="button" @click="clearFile" class="mt-2 text-xs font-semibold text-rose-600 hover:text-rose-700 underline">
                                Batal / Pilih foto lain
                            </button>
                        </div>
                    </div>
                </div>
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
