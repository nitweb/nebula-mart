<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = ['OXXO', 'AXIS-Y', 'The Ordinary', 'Omron', 'Sony', 'Apple', 'Dell', 'Himalaya', 'Vaseline', 'Simple', 'Logitech', 'Accu-Chek'];

        foreach ($brands as $index => $name) {
            Brand::firstOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name, 'sort_order' => $index + 1, 'is_active' => true, 'is_featured' => true],
            );
        }
    }
}
