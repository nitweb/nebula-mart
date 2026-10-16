<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    public function run(): void
    {
        $coupons = [
            ['code' => 'NEBULA10', 'type' => 'percentage', 'value' => 10, 'max_discount' => 500, 'min_order' => 500, 'usage_limit' => 500, 'per_customer_limit' => 1, 'description' => '10% off, up to ৳500'],
            ['code' => 'WELCOME100', 'type' => 'fixed', 'value' => 100, 'min_order' => 999, 'usage_limit' => 1000, 'per_customer_limit' => 1, 'description' => '৳100 off for new customers'],
            ['code' => 'FREEDEL', 'type' => 'free_delivery', 'value' => 0, 'min_order' => 2000, 'usage_limit' => 300, 'description' => 'Free delivery on orders over ৳2,000'],
        ];

        foreach ($coupons as $coupon) {
            Coupon::updateOrCreate(['code' => $coupon['code']], $coupon + ['applies_to' => 'all', 'is_active' => true, 'show_on_checkout' => true]);
        }
    }
}
