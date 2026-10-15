<?php

use App\Models\Admin;
use App\Models\FlashDeal;
use App\Models\Product;
use Carbon\CarbonImmutable;

beforeEach(function () {
    FlashDeal::flushLiveCache();
});

function dhaka(string $time): CarbonImmutable
{
    return CarbonImmutable::parse($time, FlashDeal::TIMEZONE);
}

function dealWith(Product $product, float $percent, array $attributes = []): FlashDeal
{
    $deal = FlashDeal::create($attributes + [
        'title' => 'Midnight Flash Sale',
        'starts_at' => '2026-10-10 00:00:00',
        'ends_at' => '2026-10-10 23:59:00',
        'repeat_daily' => true,
    ]);

    $deal->items()->create(['product_id' => $product->id, 'discount_percent' => $percent, 'deal_stock' => 5, 'sort_order' => 0]);

    return $deal;
}

function sampleProduct(): Product
{
    return Product::create(['name' => 'Test Serum', 'slug' => 'test-serum', 'price' => 1000, 'compare_price' => 1500, 'stock' => 10, 'status' => 'active']);
}

it('charges the per-product discount while a repeating deal is running', function () {
    $this->travelTo(dhaka('2026-10-15 12:00:00'));

    $product = sampleProduct();
    dealWith($product, 10);

    expect($product->display_price)->toBe(900.0)
        ->and($product->display_old_price)->toBe(1500.0)
        ->and($product->is_on_flash)->toBeTrue();
});

it('goes back to the normal price when the deal is inactive or outside its window', function () {
    $this->travelTo(dhaka('2026-10-15 12:00:00'));

    $product = sampleProduct();
    $deal = dealWith($product, 10, ['starts_at' => '2026-10-10 18:00:00', 'ends_at' => '2026-10-10 23:00:00']);

    expect($product->display_price)->toBe(1000.0);

    $deal->update(['starts_at' => '2026-10-10 08:00:00', 'ends_at' => '2026-10-10 23:00:00']);
    expect($product->display_price)->toBe(900.0);

    $deal->update(['is_active' => false]);
    expect($product->display_price)->toBe(1000.0);
});

it('ends a one-off deal and ends a "23:59" window at midnight', function () {
    $deal = new FlashDeal([
        'starts_at' => '2026-10-10 00:00:00',
        'ends_at' => '2026-10-10 23:59:00',
        'repeat_daily' => true,
        'is_active' => true,
    ]);

    [$from, $to] = $deal->windowAt(dhaka('2026-10-15 23:59:30'));

    expect($from->format('Y-m-d H:i'))->toBe('2026-10-15 00:00')
        ->and($to->format('Y-m-d H:i'))->toBe('2026-10-16 00:00');

    $deal->repeat_daily = false;

    expect($deal->windowAt(dhaka('2026-10-15 12:00:00')))->toBeNull()
        ->and($deal->phase(dhaka('2026-10-15 12:00:00')))->toBe('ended');
});

it('shows the live flash deal on the deal page and the product page', function () {
    $this->travelTo(dhaka('2026-10-15 12:00:00'));

    $product = sampleProduct();
    dealWith($product, 10);

    $this->get('/flash-deals')->assertOk()->assertSee('Midnight Flash Sale')->assertSee('Test Serum');
    $this->get('/product/test-serum')->assertOk()->assertSee('Flash deal')->assertSee('900');
});

it('lets an admin create a flash deal with per-product discounts', function () {
    $admin = Admin::forceCreate(['name' => 'Admin', 'email' => 'deal-admin@example.com', 'password' => bcrypt('secret-pass')]);
    $product = sampleProduct();

    $this->actingAs($admin, 'admin')
        ->post(route('admin.flash-deals.store'), [
            'title' => 'Beauty Week',
            'starts_at' => '2026-11-15T00:00',
            'ends_at' => '2026-11-21T23:59',
            'repeat_daily' => '1',
            'is_active' => '1',
            'products' => [['product_id' => $product->id, 'discount_percent' => '25', 'deal_stock' => '12']],
        ])
        ->assertRedirect(route('admin.flash-deals.index'));

    $deal = FlashDeal::firstWhere('title', 'Beauty Week');

    expect($deal)->not->toBeNull()
        ->and($deal->items)->toHaveCount(1)
        ->and($deal->items->first()->discount_percent)->toBe(25.0)
        ->and($deal->items->first()->deal_stock)->toBe(12);
});

it('requires at least one product in a deal', function () {
    $admin = Admin::forceCreate(['name' => 'Admin', 'email' => 'deal-admin@example.com', 'password' => bcrypt('secret-pass')]);

    $this->actingAs($admin, 'admin')
        ->post(route('admin.flash-deals.store'), [
            'title' => 'Empty',
            'starts_at' => '2026-11-15T00:00',
            'ends_at' => '2026-11-15T23:59',
        ])
        ->assertSessionHasErrors('products');
});
