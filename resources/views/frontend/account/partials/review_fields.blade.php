@php $uid = 'rv'.($review?->id ?? 'new').'-'.uniqid(); @endphp
<div>
    <label for="{{ $uid }}-rating" class="block font-bold text-sm mb-1.5">Rating <span class="text-primary">*</span></label>
    <select id="{{ $uid }}-rating" name="rating" required class="{{ $field }}">
        @foreach ($labels as $value => $label)
            <option value="{{ $value }}" @selected((int) old('rating', $review?->rating ?? 5) === $value)>{{ $label }}</option>
        @endforeach
    </select>
</div>
<div>
    <label for="{{ $uid }}-title" class="block font-bold text-sm mb-1.5">Title <span class="font-medium text-ink/55">(optional)</span></label>
    <input id="{{ $uid }}-title" name="title" type="text" maxlength="120" value="{{ old('title', $review?->title) }}" class="{{ $field }}">
</div>
<div class="sm:col-span-2">
    <label for="{{ $uid }}-body" class="block font-bold text-sm mb-1.5">Your review <span class="font-medium text-ink/55">(optional)</span></label>
    <textarea id="{{ $uid }}-body" name="body" rows="3" maxlength="1000" class="{{ $field }}">{{ old('body', $review?->body) }}</textarea>
    @error('body')<p class="text-sm font-bold text-danger mt-1.5">{{ $message }}</p>@enderror
</div>
