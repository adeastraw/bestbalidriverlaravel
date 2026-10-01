@extends('layouts.admin')

@section('title', 'Edit Review')
@section('header_title', 'Edit Review')

@section('content')
    <div class="max-w-2xl space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="font-display text-2xl font-bold text-forest-900">Edit Customer Review</h1>
            <a href="{{ route('admin.reviews.index') }}" class="text-xs font-semibold text-sand-600 hover:underline">
                ← Back to Reviews
            </a>
        </div>

        <form action="{{ route('admin.reviews.update', $review->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-2xl border border-sand-200 shadow-sm space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="customer_name" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Customer Name *</label>
                    <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name', $review->customer_name) }}" required 
                           class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                </div>

                <div>
                    <label for="country" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Country</label>
                    <input type="text" name="country" id="country" value="{{ old('country', $review->country) }}" 
                           class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                </div>

                <div>
                    <label for="rating" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Star Rating (1 - 5) *</label>
                    <select name="rating" id="rating" required class="w-full rounded-xl border-sand-300 text-sm">
                        @for($i = 5; $i >= 1; $i--)
                            <option value="{{ $i }}" {{ old('rating', $review->rating) == $i ? 'selected' : '' }}>
                                {{ str_repeat('★', $i) }} ({{ $i }} Stars)
                            </option>
                        @endfor
                    </select>
                </div>

                <div>
                    <label for="driver_id" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Associated Driver (Optional)</label>
                    <select name="driver_id" id="driver_id" class="w-full rounded-xl border-sand-300 text-sm">
                        <option value="">None / General Review</option>
                        @foreach($drivers as $d)
                            <option value="{{ $d->id }}" {{ old('driver_id', $review->driver_id) == $d->id ? 'selected' : '' }}>
                                {{ $d->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="sm:col-span-2">
                    <label for="trip_id" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Associated Tour (Optional)</label>
                    <select name="trip_id" id="trip_id" class="w-full rounded-xl border-sand-300 text-sm">
                        <option value="">None / General Review</option>
                        @foreach($trips as $t)
                            <option value="{{ $t->id }}" {{ old('trip_id', $review->trip_id) == $t->id ? 'selected' : '' }}>
                                {{ $t->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label for="review" class="block text-xs font-bold text-sand-700 uppercase tracking-wider mb-1">Customer Review Text *</label>
                <textarea name="review" id="review" rows="4" required 
                          class="w-full rounded-xl border-sand-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">{{ old('review', $review->review) }}</textarea>
            </div>

            <!-- Photo Upload with Live Preview & Existing Image Management -->
            <div x-data="{
                hasExisting: {{ $review->image ? 'true' : 'false' }},
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
                clearNewFile() {
                    this.previewUrl = null;
                    this.fileName = '';
                    this.$refs.fileInput.value = '';
                }
            }" class="space-y-3">
                <label class="block text-xs font-bold text-sand-700 uppercase tracking-wider">
                    Traveler Photo / Documentation
                </label>
                <p class="text-xs text-sand-500">
                    Foto dokumentasi asli wisatawan menambah kepercayaan calon pelanggan.
                </p>

                @if($review->image)
                    <div class="p-4 rounded-2xl bg-sand-50 border border-sand-200 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                        <div class="flex items-center gap-3.5">
                            <img src="{{ $review->image_url }}" alt="Existing Review Photo" class="w-20 h-16 rounded-xl object-cover border border-sand-300 shadow-xs flex-shrink-0">
                            <div>
                                <span class="text-xs font-bold text-forest-900 block">Foto Saat Ini Aktif</span>
                                <span class="text-[11px] text-emerald-700 font-medium block">Tampil di halaman publik & homepage</span>
                            </div>
                        </div>

                        <label class="flex items-center gap-2 cursor-pointer text-xs font-semibold text-rose-700 hover:text-rose-800 bg-rose-50 px-3 py-1.5 rounded-xl border border-rose-200 transition-colors">
                            <input type="checkbox" name="remove_image" value="1" class="rounded text-rose-600 focus:ring-rose-500 border-rose-300">
                            <span>Hapus foto ini</span>
                        </label>
                    </div>
                @endif

                <div class="border-2 border-dashed border-sand-300 hover:border-emerald-500 rounded-2xl p-4 transition-colors bg-sand-50/50">
                    <div x-show="!previewUrl" class="text-center py-5">
                        <div class="w-10 h-10 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center mx-auto mb-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <label for="image" class="cursor-pointer text-sm font-semibold text-emerald-700 hover:text-emerald-800 underline">
                            <span>{{ $review->image ? 'Pilih foto baru untuk mengganti' : 'Pilih foto untuk diunggah' }}</span>
                            <input type="file" name="image" id="image" x-ref="fileInput" @change="handleFileChange" accept="image/png,image/jpeg,image/jpg,image/webp" class="sr-only">
                        </label>
                        <p class="text-[11px] text-sand-500 mt-1">Format: JPG, JPEG, PNG, atau WebP (Maksimal 5MB)</p>
                    </div>

                    <div x-show="previewUrl" x-cloak class="flex flex-col sm:flex-row items-center gap-4">
                        <div class="relative w-36 h-28 rounded-xl overflow-hidden bg-sand-200 border border-sand-300 flex-shrink-0 shadow-xs">
                            <img :src="previewUrl" alt="Preview Foto Baru" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-grow space-y-1 text-center sm:text-left">
                            <div class="text-xs font-semibold text-forest-900 truncate max-w-xs" x-text="fileName"></div>
                            <div class="text-[11px] text-emerald-600 font-medium">Foto baru siap menggantikan foto sebelumnya</div>
                            <button type="button" @click="clearNewFile" class="mt-2 text-xs font-semibold text-rose-600 hover:text-rose-700 underline">
                                Batal ganti foto
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-6 pt-2">
                <label class="flex items-center gap-2 cursor-pointer text-sm text-sand-800">
                    <input type="checkbox" name="status" value="1" {{ old('status', $review->status) ? 'checked' : '' }}
                           class="rounded text-emerald-600 focus:ring-emerald-500 border-sand-300">
                    <span class="font-semibold">Published</span>
                </label>

                <label class="flex items-center gap-2 cursor-pointer text-sm text-sand-800">
                    <input type="checkbox" name="featured" value="1" {{ old('featured', $review->featured) ? 'checked' : '' }}
                           class="rounded text-amber-500 focus:ring-amber-400 border-sand-300">
                    <span class="font-semibold text-amber-800">Feature on Homepage</span>
                </label>
            </div>

            <div class="pt-4 border-t border-sand-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.reviews.index') }}" class="px-5 py-2.5 rounded-xl bg-sand-100 hover:bg-sand-200 text-sand-800 text-xs font-semibold">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-semibold shadow-md">
                    Update Review
                </button>
            </div>
        </form>
    </div>
@endsection
