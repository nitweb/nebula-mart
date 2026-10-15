<?php

namespace Database\Seeders;

use App\Models\FlashDeal;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FlashDealSeeder extends Seeder
{
    /**
     * Sample flash deal built from the products ProductSeeder used to mark as flash items.
     * Run ProductSeeder first, then: php artisan db:seed --class=FlashDealSeeder
     */
    public function run(): void
    {
        if (FlashDeal::exists()) {
            return;
        }

        $today = now(FlashDeal::TIMEZONE)->startOfDay();

        $deal = FlashDeal::create([
            'title' => 'Midnight Flash Sale',
            'starts_at' => $today->format('Y-m-d H:i:s'),
            'ends_at' => $today->setTime(23, 59)->format('Y-m-d H:i:s'),
            'repeat_daily' => true,
            'show_on_home' => true,
            'show_countdown' => true,
            'is_active' => true,
        ]);

        $picks = [
            ['OXXO Premium Cotton Panjabi for Men', 10, 20],
            ['AXIS-Y Dark Spot Correcting Glow Serum 50ml', 15, 25],
            ['Dot & Key Vitamin C + E Sunscreen SPF 50+ 80gm', 20, 30],
            ['The Ordinary Niacinamide 10% + Zinc 1% 30ml', 25, 35],
        ];

        foreach ($picks as $index => [$name, $percent, $stock]) {
            $productId = Product::where('slug', Str::slug($name))->value('id');

            if (! $productId) {
                continue;
            }

            $deal->items()->create([
                'product_id' => $productId,
                'discount_percent' => $percent,
                'deal_stock' => $stock,
                'sort_order' => $index,
            ]);
        }
    }
}
