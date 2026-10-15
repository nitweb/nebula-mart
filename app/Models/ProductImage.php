<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['product_id', 'path', 'sort_order'])]
class ProductImage extends Model
{
    public function getUrlAttribute(): string
    {
        return asset($this->path);
    }
}
