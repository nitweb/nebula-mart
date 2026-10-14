<div class="grid lg:grid-cols-3 gap-6 items-start">
    <div class="lg:col-span-2 space-y-6">

        <section class="card">
            <div class="card-h">
                <h3>Banner content</h3>
            </div>
            <div class="card-b">
                <div class="grid sm:grid-cols-2 gap-5">
                    <div class="sm:col-span-2">
                        <label class="lbl" for="alt_text">Alt name</label>
                        <input class="input" id="alt_text" name="alt_text" type="text" value="{{ old('alt_text', $banner?->alt_text) }}">
                        @error('alt_text')
                            <p class="text-danger text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="lbl" for="link">Link</label>
                        <input class="input" id="link" name="link" type="text" value="{{ old('link', $banner?->link) }}" placeholder="/shop">
                        @error('link')
                            <p class="text-danger text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="lbl" for="sort_order">Display order</label>
                        <input class="input" id="sort_order" name="sort_order" type="number" min="0" value="{{ old('sort_order', $banner?->sort_order ?? 1) }}">
                        @error('sort_order')
                            <p class="text-danger text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </section>

        <section class="card">
            <div class="card-h">
                <h3>Image</h3>
            </div>
            <div class="card-b">
                <label class="drop block">
                    <input type="file" name="image" class="hidden" accept="image/*" data-preview="#bimg">
                    <img id="bimg" src="{{ $banner ? $banner->image_url : asset('assets/admin/img/no-image.svg') }}" class="w-full max-h-64 object-cover rounded-2xl mb-3" alt="">
                    <p class="font-bold">Upload banner image</p>
                    <p class="text-xs text-ink/50 mt-1">Auto converted to 1942×809 · WEBP</p>
                </label>
                @error('image')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </section>

    </div>

    <div class="space-y-6">
        <section class="card">
            <div class="card-h">
                <h3>Visibility</h3>
            </div>
            <div class="card-b">
                <label class="lbl" for="is_active">Status</label>
                <select class="select" id="is_active" name="is_active">
                    <option value="1" @selected(old('is_active', $banner?->is_active ?? true) == 1)>Active</option>
                    <option value="0" @selected(old('is_active', $banner?->is_active ?? true) == 0)>Draft</option>
                </select>
            </div>
        </section>
    </div>
</div>

<div class="savebar mt-6">
    <a href="{{ route('admin.banners.index') }}" class="btn btn-ghost">Cancel</a>
    <button type="submit" class="btn btn-primary">
        <svg class="ic ic-sm">
            <use href="#i-check" />
        </svg>Save banner
    </button>
</div>
