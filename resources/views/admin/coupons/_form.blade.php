@php
    $old = session()->hasOldInput();
    $type = old('type', $coupon?->type ?? 'percentage');
    $appliesTo = old('applies_to', $coupon?->applies_to ?? 'all');
    $isActive = $old ? (bool) old('is_active') : ($coupon?->is_active ?? true);
    $showOnCheckout = $old ? (bool) old('show_on_checkout') : ($coupon?->show_on_checkout ?? true);
    $selectedCategories = array_map('intval', $old ? (array) old('categories', []) : ($coupon?->categories->pluck('id')->all() ?? []));
    $selectedProducts = array_map('intval', $old ? (array) old('products', []) : ($coupon?->products->pluck('id')->all() ?? []));
    $number = fn (?float $n) => $n === null ? '' : rtrim(rtrim(number_format($n, 2, '.', ''), '0'), '.');
@endphp

<div class="grid lg:grid-cols-3 gap-6 items-start">
    <div class="lg:col-span-2 space-y-6">

        <section class="card">
            <div class="card-h"><h3>Coupon details</h3></div>
            <div class="card-b">
                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="lbl" for="code">Coupon code <span class="text-danger">*</span></label>
                        <div class="flex gap-2">
                            <input class="input font-mono uppercase" id="code" name="code" type="text" value="{{ old('code', $coupon?->code) }}" placeholder="SAVE20" maxlength="40" required>
                            <button type="button" class="btn btn-ghost" id="gen-code" title="Generate a code">Generate</button>
                        </div>
                        @error('code')<p class="text-danger text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="lbl" for="type">Discount type</label>
                        <select class="select" id="type" name="type">
                            @foreach (\App\Models\Coupon::TYPES as $value => $label)
                                <option value="{{ $value }}" @selected($type === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('type')<p class="text-danger text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div id="value-wrap">
                        <label class="lbl" for="value">Discount value <span class="text-ink/50" id="value-unit">{{ $type === 'fixed' ? '(৳)' : '(%)' }}</span></label>
                        <input class="input" id="value" name="value" type="number" step="0.01" min="0" value="{{ old('value', $number($coupon?->value ?? 10)) }}">
                        @error('value')<p class="text-danger text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div id="max-wrap">
                        <label class="lbl" for="max_discount">Max discount</label>
                        <div class="addon"><span>৳</span><input class="input" id="max_discount" name="max_discount" type="number" step="0.01" min="0" value="{{ old('max_discount', $number($coupon?->max_discount)) }}" placeholder="No cap"></div>
                        @error('max_discount')<p class="text-danger text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="lbl" for="min_order">Minimum order</label>
                        <div class="addon"><span>৳</span><input class="input" id="min_order" name="min_order" type="number" step="0.01" min="0" value="{{ old('min_order', $number($coupon?->min_order)) }}" placeholder="0"></div>
                        @error('min_order')<p class="text-danger text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="lbl" for="usage_limit">Usage limit (total)</label>
                        <input class="input" id="usage_limit" name="usage_limit" type="number" min="1" value="{{ old('usage_limit', $coupon?->usage_limit) }}" placeholder="Unlimited">
                        @error('usage_limit')<p class="text-danger text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="lbl" for="per_customer_limit">Per-customer limit</label>
                        <input class="input" id="per_customer_limit" name="per_customer_limit" type="number" min="1" value="{{ old('per_customer_limit', $coupon?->per_customer_limit) }}" placeholder="Unlimited">
                        @error('per_customer_limit')<p class="text-danger text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="lbl" for="applies_to">Applies to</label>
                        <select class="select" id="applies_to" name="applies_to">
                            @foreach (\App\Models\Coupon::SCOPES as $value => $label)
                                <option value="{{ $value }}" @selected($appliesTo === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('applies_to')<p class="text-danger text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div class="sm:col-span-2" id="scope-categories" @if ($appliesTo !== 'categories') hidden @endif>
                        <label class="lbl" for="categories">Categories</label>
                        <select class="select" id="categories" name="categories[]" multiple size="8">
                            @foreach ($categoryOptions as $category)
                                <option value="{{ $category->id }}" @selected(in_array($category->id, $selectedCategories, true))>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <p class="text-xs text-ink/50 mt-1">Hold Ctrl / Cmd to pick several. Sub-categories are included.</p>
                        @error('categories')<p class="text-danger text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div class="sm:col-span-2" id="scope-products" @if ($appliesTo !== 'products') hidden @endif>
                        <label class="lbl" for="products">Products</label>
                        <select class="select" id="products" name="products[]" multiple size="8">
                            @foreach ($productOptions as $product)
                                <option value="{{ $product->id }}" @selected(in_array($product->id, $selectedProducts, true))>{{ $product->name }}</option>
                            @endforeach
                        </select>
                        <p class="text-xs text-ink/50 mt-1">Hold Ctrl / Cmd to pick several.</p>
                        @error('products')<p class="text-danger text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label class="lbl" for="description">Description (internal)</label>
                        <textarea class="textarea" id="description" name="description" rows="2">{{ old('description', $coupon?->description) }}</textarea>
                        @error('description')<p class="text-danger text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
        </section>

    </div>

    <div class="space-y-6">

        <section class="card">
            <div class="card-h"><h3>Schedule</h3></div>
            <div class="card-b">
                <div class="space-y-5">
                    <div>
                        <label class="lbl" for="starts_at">Starts</label>
                        <input class="input" id="starts_at" name="starts_at" type="date" value="{{ old('starts_at', $coupon?->starts_at?->format('Y-m-d')) }}">
                        @error('starts_at')<p class="text-danger text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="lbl" for="expires_at">Expires</label>
                        <input class="input" id="expires_at" name="expires_at" type="date" value="{{ old('expires_at', $coupon?->expires_at?->format('Y-m-d')) }}">
                        @error('expires_at')<p class="text-danger text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div class="flex items-center justify-between gap-4">
                        <div><p class="font-semibold">Active</p></div>
                        <label class="switch"><input type="checkbox" name="is_active" value="1" @checked($isActive)><i></i></label>
                    </div>
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="font-semibold">Show on checkout</p>
                            <p class="text-xs text-ink/50">Suggest to customers</p>
                        </div>
                        <label class="switch"><input type="checkbox" name="show_on_checkout" value="1" @checked($showOnCheckout)><i></i></label>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>

<div class="savebar mt-6">
    <a href="{{ route('admin.coupons.index') }}" class="btn btn-ghost">Cancel</a>
    <button type="submit" class="btn btn-primary">
        <svg class="ic ic-sm"><use href="#i-check" /></svg>Save coupon
    </button>
</div>

<script>
    (function () {
        var type = document.getElementById('type');
        var scope = document.getElementById('applies_to');
        var code = document.getElementById('code');

        function sync() {
            var free = type.value === 'free_delivery';
            document.getElementById('value-wrap').hidden = free;
            document.getElementById('max-wrap').hidden = type.value !== 'percentage';
            document.getElementById('value-unit').textContent = type.value === 'fixed' ? '(৳)' : '(%)';
            document.getElementById('scope-categories').hidden = scope.value !== 'categories';
            document.getElementById('scope-products').hidden = scope.value !== 'products';
        }

        type.addEventListener('change', sync);
        scope.addEventListener('change', sync);
        code.addEventListener('input', function () { code.value = code.value.toUpperCase().replace(/\s+/g, ''); });
        document.getElementById('gen-code').addEventListener('click', function () {
            var chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789', out = '';
            for (var i = 0; i < 8; i++) out += chars.charAt(Math.floor(Math.random() * chars.length));
            code.value = out;
        });
        sync();
    })();
</script>
