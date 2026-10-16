<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('number', 20)->nullable()->unique();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            $table->string('name');
            $table->string('phone', 20);
            $table->string('email');
            $table->string('division', 60);
            $table->string('district', 60);
            $table->string('area', 120);
            $table->text('address');
            $table->text('note')->nullable();

            $table->string('zone', 30);
            $table->string('zone_label', 60);
            $table->string('delivery_time', 40)->nullable();

            $table->string('payment_method', 20)->default('cod');
            $table->string('payment_status', 20)->default('unpaid');
            $table->string('status', 20)->default('pending');

            $table->decimal('subtotal', 12, 2)->default(0);
            $table->decimal('discount', 12, 2)->default(0);
            $table->string('coupon_code', 40)->nullable();
            $table->decimal('delivery_fee', 12, 2)->default(0);
            $table->decimal('total', 12, 2)->default(0);

            $table->string('courier', 30)->nullable();
            $table->string('tracking_id', 80)->nullable();
            $table->text('admin_note')->nullable();
            $table->timestamp('restocked_at')->nullable();
            $table->timestamps();

            $table->index(['status', 'created_at']);
            $table->index('phone');
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->nullable()->constrained()->nullOnDelete();
            $table->unsignedBigInteger('variant_id')->default(0);
            $table->string('name');
            $table->string('variant_label')->nullable();
            $table->string('sku', 80)->nullable();
            $table->string('image')->nullable();
            $table->decimal('unit_price', 12, 2);
            $table->decimal('old_price', 12, 2)->nullable();
            $table->unsignedSmallInteger('quantity');
            $table->decimal('line_total', 12, 2);
            $table->timestamps();
        });

        Schema::create('order_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->string('status', 20);
            $table->string('note')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_events');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
};
