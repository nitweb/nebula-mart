<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('flash_deals', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->dateTime('starts_at');
            $table->dateTime('ends_at');
            $table->boolean('repeat_daily')->default(false);
            $table->boolean('show_on_home')->default(true);
            $table->boolean('show_countdown')->default(true);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['is_active', 'starts_at']);
        });

        Schema::create('flash_deal_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flash_deal_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->decimal('discount_percent', 5, 2)->default(0);
            $table->unsignedInteger('deal_stock')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->unique(['flash_deal_id', 'product_id']);
        });

        if (Schema::hasColumn('products', 'is_flash')) {
            $this->moveFlaggedProductsIntoADeal();

            Schema::table('products', function (Blueprint $table) {
                $table->dropColumn('is_flash');
            });
        }
    }

    public function down(): void
    {
        if (! Schema::hasColumn('products', 'is_flash')) {
            Schema::table('products', function (Blueprint $table) {
                $table->boolean('is_flash')->default(false)->after('is_new');
            });
        }

        $productIds = DB::table('flash_deal_products')->distinct()->pluck('product_id');

        if ($productIds->isNotEmpty()) {
            DB::table('products')->whereIn('id', $productIds)->update(['is_flash' => true]);
        }

        Schema::dropIfExists('flash_deal_products');
        Schema::dropIfExists('flash_deals');
    }

    /**
     * Products that used the old "Include in flash deals" switch keep showing up: they move into one
     * daily-repeating deal at 0% so their current prices do not change until an admin sets a discount.
     */
    private function moveFlaggedProductsIntoADeal(): void
    {
        $productIds = DB::table('products')->where('is_flash', true)->orderBy('id')->pluck('id');

        if ($productIds->isEmpty()) {
            return;
        }

        $today = now('Asia/Dhaka')->startOfDay();

        $dealId = DB::table('flash_deals')->insertGetId([
            'title' => 'Daily Flash Deals',
            'starts_at' => $today->format('Y-m-d H:i:s'),
            'ends_at' => $today->setTime(23, 59)->format('Y-m-d H:i:s'),
            'repeat_daily' => true,
            'show_on_home' => true,
            'show_countdown' => true,
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        foreach ($productIds->values() as $index => $productId) {
            DB::table('flash_deal_products')->insert([
                'flash_deal_id' => $dealId,
                'product_id' => $productId,
                'discount_percent' => 0,
                'deal_stock' => null,
                'sort_order' => $index,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
};
