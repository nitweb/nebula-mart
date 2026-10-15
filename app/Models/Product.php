<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'category_id', 'brand_id', 'name', 'slug', 'model', 'short_description', 'description',
    'price', 'compare_price', 'cost_price', 'sku', 'barcode', 'stock', 'low_stock', 'weight',
    'track_inventory', 'status', 'is_featured', 'is_new', 'is_flash', 'is_cod',
    'is_free_delivery', 'is_returnable', 'tags', 'meta_title', 'meta_description', 'sold_count',
])]
class Product extends Model
{
    protected function casts(): array
    {
        return [
            'price' => 'float',
            'compare_price' => 'float',
            'cost_price' => 'float',
            'weight' => 'float',
            'stock' => 'integer',
            'low_stock' => 'integer',
            'track_inventory' => 'boolean',
            'is_featured' => 'boolean',
            'is_new' => 'boolean',
            'is_flash' => 'boolean',
            'is_cod' => 'boolean',
            'is_free_delivery' => 'boolean',
            'is_returnable' => 'boolean',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order')->orderBy('id');
    }

    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class)->orderBy('sort_order')->orderBy('id');
    }

    #[Scope]
    protected function active(Builder $query): void
    {
        $query->where('status', 'active');
    }

    #[Scope]
    protected function inCategory(Builder $query, int $categoryId): void
    {
        $query->whereIn('category_id', [$categoryId, ...Category::descendantIds($categoryId)]);
    }

    public function getUrlAttribute(): string
    {
        return url('/product/'.$this->slug);
    }

    public function getCoverUrlAttribute(): string
    {
        $image = $this->relationLoaded('images') ? $this->images->first() : $this->images()->first();

        return $image ? $image->url : asset('assets/frontend/images/placeholder.svg');
    }

    /** Total sellable stock: sum of variants if there are any, else the product stock. */
    public function getStockTotalAttribute(): int
    {
        $variants = $this->relationLoaded('variants') ? $this->variants : $this->variants()->get();

        return $variants->isNotEmpty() ? (int) $variants->sum('stock') : (int) $this->stock;
    }

    public function getInStockAttribute(): bool
    {
        return ! $this->track_inventory || $this->stock_total > 0;
    }

    public function getIsLowStockAttribute(): bool
    {
        return $this->track_inventory && $this->stock_total > 0 && $this->stock_total <= (int) ($this->attributes['low_stock'] ?? 10);
    }

    public function getDiscountPercentAttribute(): int
    {
        if (! $this->compare_price || $this->compare_price <= $this->price) {
            return 0;
        }

        return (int) round((1 - $this->price / $this->compare_price) * 100);
    }

    public function getHasVariantsAttribute(): bool
    {
        return ($this->relationLoaded('variants') ? $this->variants : $this->variants()->get())->isNotEmpty();
    }

    /** @return list<string> */
    public function getTagListAttribute(): array
    {
        return array_values(array_filter(array_map('trim', explode(',', (string) $this->tags))));
    }
}
