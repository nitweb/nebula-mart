<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['coupon_id', 'user_id', 'order_id', 'discount'])]
class CouponUsage extends Model
{
    protected function casts(): array
    {
        return ['discount' => 'float'];
    }
}
