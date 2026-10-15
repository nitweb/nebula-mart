<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Sample products using the images already in public/assets/frontend/images/products.
     * Run CategorySeeder and BrandSeeder first, then: php artisan db:seed --class=ProductSeeder
     */
    public function run(): void
    {
        $dir = 'assets/frontend/images/products/';

        $items = [
            ['OXXO Premium Cotton Panjabi for Men', 'Fashion', 'OXXO', 946, 1290, 'oxxo-premium-cotton-panjabi-for-men.webp', ['flash' => true, 'featured' => true, 'variants' => [['M', 'White', 20], ['L', 'White', 15], ['XL', 'Navy', 13]]]],
            ['AXIS-Y Dark Spot Correcting Glow Serum 50ml', 'Beauty', 'AXIS-Y', 1299, 2000, 'axis-y-dark-spot-correcting-glow-serum-50ml.webp', ['flash' => true, 'stock' => 40]],
            ['Dot & Key Vitamin C + E Sunscreen SPF 50+ 80gm', 'Beauty', null, 999, 1800, 'dot-and-key-vitamin-c-plus-e-sunscreen-spf-50-plus-80gm.webp', ['flash' => true, 'stock' => 25]],
            ['The Ordinary Niacinamide 10% + Zinc 1% 30ml', 'Beauty', 'The Ordinary', 1099, 1650, 'the-ordinary-niacinamide-10-percent-plus-zinc-1-percent-30ml.webp', ['flash' => true, 'stock' => 60]],
            ['Himalaya Moisturizing Aloe Vera Face Gel 100ml', 'Beauty', 'Himalaya', 135, 199, 'himalaya-moisturizing-aloe-vera-face-gel-100ml.webp', ['new' => true, 'stock' => 120]],
            ['Simple Refreshing Facial Wash Gel 150ml', 'Beauty', 'Simple', 450, 620, 'simple-refreshing-facial-wash-gel-150ml.webp', ['new' => true, 'stock' => 80]],
            ['Vaseline Gluta Hya Dewy Radiance Lotion 200ml', 'Beauty', 'Vaseline', 560, 800, 'vaseline-gluta-hya-dewy-radiance-lotion-200ml.webp', ['new' => true, 'stock' => 70]],
            ['Kumarika Anti Hair Fall Serum 30ml', 'Beauty', null, 390, 550, 'kumarika-anti-hair-fall-serum-30ml.webp', ['stock' => 50]],
            ['Accu-Chek Instant Blood Glucose Meter (Bluetooth)', 'Medical', 'Accu-Chek', 2450, 3200, 'accu-chek-instant-blood-glucose-meter-bluetooth.webp', ['featured' => true, 'stock' => 18]],
            ['Omron HEM-7156T Blood Pressure Monitor', 'Medical', 'Omron', 5900, 7400, 'omron-hem-7156t.webp', ['featured' => true, 'stock' => 9]],
            ['Omron HN-289 Digital Personal Body Weight Scale', 'Medical', 'Omron', 2800, 3500, 'omron-hn-289-digital-personal-body-weight-scale.webp', ['stock' => 14]],
            ['Fingertip Pulse Oximeter OLED (Jumper JPD-500D)', 'Medical', null, 1650, 2300, 'fingertip-pulse-oximeter-oled-version-jumper-jpd-500d.webp', ['featured' => true, 'stock' => 33]],
            ['Digital Thermometer LCD', 'Medical', null, 250, 350, 'digital-thermometer-lcd.webp', ['stock' => 90]],
            ['Tynor Abdominal Support 9" L', 'Medical', null, 1450, 1900, 'tynor-abdominal-support-9-l-a-01.webp', ['stock' => 21]],
        ];

        foreach ($items as $index => [$name, $categoryName, $brandName, $price, $compare, $image, $opts]) {
            $slug = Str::slug($name);

            if (Product::where('slug', $slug)->exists()) {
                continue;
            }

            $product = Product::create([
                'category_id' => Category::where('slug', Str::slug($categoryName))->value('id'),
                'brand_id' => $brandName ? Brand::where('slug', Str::slug($brandName))->value('id') : null,
                'name' => $name,
                'slug' => $slug,
                'short_description' => '7-day returns and official warranty.',
                'description' => $name.". Genuine product with official warranty.\n\nCash on delivery available all over Bangladesh.",
                'price' => $price,
                'compare_price' => $compare,
                'sku' => 'NM-'.(1001 + $index),
                'stock' => $opts['stock'] ?? 0,
                'is_featured' => $opts['featured'] ?? false,
                'is_new' => $opts['new'] ?? false,
                'status' => 'active',
            ]);

            $product->images()->create(['path' => $dir.$image, 'sort_order' => 0]);

            foreach ($opts['variants'] ?? [] as $i => [$size, $color, $stock]) {
                $product->variants()->create(['size' => $size, 'color' => $color, 'stock' => $stock, 'sort_order' => $i]);
            }
        }
    }
}
