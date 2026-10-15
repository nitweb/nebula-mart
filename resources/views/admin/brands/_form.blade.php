@php
    $isActive = session()->hasOldInput() ? (bool) old('is_active') : ($brand?->is_active ?? true);
    $isFeatured = session()->hasOldInput() ? (bool) old('is_featured') : ($brand?->is_featured ?? false);
@endphp

<div class="grid lg:grid-cols-3 gap-6 items-start">
    <div class="lg:col-span-2 space-y-6">

        <section class="card">
            <div class="card-h"><h3>Brand details</h3></div>
            <div class="card-b">
                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="lbl" for="name">Brand name <span class="text-danger">*</span></label>
                        <input class="input" id="name" name="name" type="text" value="{{ old('name', $brand?->name) }}" required>
                        @error('name')<p class="text-danger text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="lbl" for="slug">Slug</label>
                        <input class="input" id="slug" name="slug" type="text" value="{{ old('slug', $brand?->slug) }}" placeholder="auto-generated from the name" @if (! $brand) data-slug-from="#name" @endif>
                        @error('slug')<p class="text-danger text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="lbl" for="website">Website</label>
                        <input class="input" id="website" name="website" type="url" value="{{ old('website', $brand?->website ?? 'https://') }}">
                        @error('website')<p class="text-danger text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="lbl" for="country">Country</label>
                        <input class="input" id="country" name="country" type="text" value="{{ old('country', $brand?->country ?? 'Bangladesh') }}">
                        @error('country')<p class="text-danger text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label class="lbl" for="description">Description</label>
                        <textarea class="textarea" id="description" name="description" rows="3">{{ old('description', $brand?->description) }}</textarea>
                        @error('description')<p class="text-danger text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
        </section>

        <section class="card">
            <div class="card-h"><h3>SEO</h3></div>
            <div class="card-b">
                <div class="grid gap-5">
                    <div>
                        <label class="lbl" for="meta_title">Meta title</label>
                        <input class="input" id="meta_title" name="meta_title" type="text" value="{{ old('meta_title', $brand?->meta_title) }}">
                        @error('meta_title')<p class="text-danger text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="lbl" for="meta_description">Meta description</label>
                        <textarea class="textarea" id="meta_description" name="meta_description" rows="2">{{ old('meta_description', $brand?->meta_description) }}</textarea>
                        @error('meta_description')<p class="text-danger text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
        </section>

    </div>

    <div class="space-y-6">

        <section class="card">
            <div class="card-h"><h3>Brand logo</h3></div>
            <div class="card-b">
            <div>
                <label class="lbl">Brand logo</label>
                <div class="drop !p-5 flex flex-col sm:flex-row items-center gap-5 text-left">
                    <img id="blogo" src="{{ $brand?->logo_url ?? asset('assets/admin/img/no-image.svg') }}" class="w-24 h-24 rounded-2xl object-contain bg-white border border-line shrink-0" alt="">
                    <div class="text-center sm:text-left">
                        <p class="font-bold">Brand logo</p>
                        <p class="text-xs text-ink/50 mt-1 mb-3">Square logo · PNG, JPG, WEBP or SVG · saved as 400×400 webp</p>
                        <div class="flex gap-2 justify-center sm:justify-start">
                            <label class="btn btn-primary btn-sm cursor-pointer">
                                <svg class="ic ic-sm"><use href="#i-upload" /></svg>Upload
                                <input type="file" name="logo" class="hidden" accept="image/*" data-preview="#blogo">
                            </label>
                            <button type="button" class="btn btn-ghost btn-sm" data-reset-img="#blogo">Remove</button>
                        </div>
                        <input type="hidden" name="remove_logo" value="0" data-remove>
                    </div>
                </div>
                @error('logo')<p class="text-danger text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            </div>
        </section>

        <section class="card">
            <div class="card-h"><h3>Visibility</h3></div>
            <div class="card-b">
                <div class="space-y-5">
                    <div class="flex items-center justify-between gap-4">
                        <div><p class="font-semibold">Active</p></div>
                        <label class="switch"><input type="checkbox" name="is_active" value="1" @checked($isActive)><i></i></label>
                    </div>
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="font-semibold">Featured on homepage</p>
                            <p class="text-xs text-ink/50">“Top brands” strip</p>
                        </div>
                        <label class="switch"><input type="checkbox" name="is_featured" value="1" @checked($isFeatured)><i></i></label>
                    </div>
                    <div>
                        <label class="lbl" for="sort_order">Display order</label>
                        <input class="input" id="sort_order" name="sort_order" type="number" min="0" value="{{ old('sort_order', $brand?->sort_order ?? 1) }}">
                        @error('sort_order')<p class="text-danger text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>

<div class="savebar mt-6">
    <a href="{{ route('admin.brands.index') }}" class="btn btn-ghost">Cancel</a>
    <button type="submit" class="btn btn-primary">
        <svg class="ic ic-sm"><use href="#i-check" /></svg>Save brand
    </button>
</div>

<script>
    document.addEventListener('click', function (e) {
        var button = e.target.closest('[data-reset-img]');
        if (!button) return;
        var flag = button.closest('.drop').querySelector('input[data-remove]');
        if (flag) flag.value = 1;
    });
    document.addEventListener('change', function (e) {
        if (!e.target.matches('.drop input[type=file]')) return;
        var flag = e.target.closest('.drop').querySelector('input[data-remove]');
        if (flag) flag.value = 0;
    });
</script>
