<?php

use App\Models\Admin;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

function checkoutProduct(array $attributes = []): Product
{
    static $n = 0;
    $n++;

    return Product::create($attributes + [
        'name' => "Checkout Item {$n}",
        'slug' => "checkout-item-{$n}",
        'price' => 1000,
        'stock' => 10,
        'status' => 'active',
    ]);
}

function checkoutDetails(array $overrides = []): array
{
    return $overrides + [
        'name' => 'Rahim Uddin',
        'phone' => '01711223344',
        'email' => 'rahim@example.com',
        'district' => 'Dhaka',
        'area_txt' => 'Dhanmondi',
        'address' => 'House 12, Road 5',
        'pay' => 'cod',
        'terms' => '1',
    ];
}

function fillCart($test, Product $product, int $quantity = 1): void
{
    $test->postJson(route('cart.items.store'), ['product_id' => $product->id, 'quantity' => $quantity])->assertOk();
}

it('places a cash on delivery order for a guest and empties the cart', function () {
    $product = checkoutProduct();
    fillCart($this, $product, 2);

    $response = $this->post(route('checkout.store'), checkoutDetails());

    $order = Order::with('items')->firstOrFail();

    $response->assertRedirect(route('checkout.success', $order->number));

    expect($order->number)->toBe('NM-'.(10000 + $order->id))
        ->and($order->status)->toBe('pending')
        ->and($order->payment_method)->toBe('cod')
        ->and($order->payment_status)->toBe('unpaid')
        ->and($order->zone)->toBe('inside_dhaka')
        ->and($order->subtotal)->toBe(2000.0)
        ->and($order->delivery_fee)->toBe(70.0)
        ->and($order->total)->toBe(2070.0)
        ->and($order->items)->toHaveCount(1)
        ->and($order->items->first()->quantity)->toBe(2)
        ->and($product->fresh()->stock)->toBe(8)
        ->and($product->fresh()->sold_count)->toBe(2);

    $this->getJson(route('cart.summary'))->assertJsonPath('cart.count', 0);
    $this->get(route('checkout.success', $order->number))->assertOk()->assertSee($order->number);
});

it('works out the delivery fee from the district, not from the browser', function () {
    fillCart($this, checkoutProduct());

    $this->post(route('checkout.store'), checkoutDetails(['district' => 'Sylhet', 'area_txt' => 'Sylhet Sadar', 'total' => 1]))
        ->assertRedirect();

    $order = Order::firstOrFail();

    expect($order->zone)->toBe('outside_dhaka')
        ->and($order->division)->toBe('Sylhet')
        ->and($order->delivery_fee)->toBe(130.0)
        ->and($order->total)->toBe(1130.0);
});

it('applies and redeems a coupon', function () {
    $coupon = Coupon::create(['code' => 'TEN', 'type' => 'percentage', 'value' => 10]);
    fillCart($this, checkoutProduct());
    $this->postJson(route('cart.coupon.apply'), ['code' => 'TEN'])->assertOk();

    $this->post(route('checkout.store'), checkoutDetails())->assertRedirect();

    $order = Order::firstOrFail();

    expect($order->coupon_code)->toBe('TEN')
        ->and($order->discount)->toBe(100.0)
        ->and($order->total)->toBe(970.0)
        ->and($coupon->fresh()->used_count)->toBe(1);
});

it('refuses to sell more than is left in stock', function () {
    $product = checkoutProduct();
    fillCart($this, $product, 3);
    $product->update(['stock' => 1]);

    $this->from(route('checkout.show'))
        ->post(route('checkout.store'), checkoutDetails())
        ->assertSessionHasErrors();

    expect(Order::count())->toBe(0)
        ->and($product->fresh()->stock)->toBe(1);
});

it('validates the delivery details', function () {
    fillCart($this, checkoutProduct());

    $this->post(route('checkout.store'), checkoutDetails(['phone' => '12345', 'district' => 'Atlantis', 'terms' => null]))
        ->assertSessionHasErrors(['phone', 'district', 'terms']);

    expect(Order::count())->toBe(0);
});

it('sends an empty cart back to the cart page', function () {
    $this->get(route('checkout.show'))->assertRedirect(route('cart.index'));
});

it('lets guests open checkout, and sends them to login when guest checkout is off', function () {
    fillCart($this, checkoutProduct());

    $this->get(route('checkout.show'))->assertOk()->assertSee('Delivery details');

    Setting::putMany(['guest_checkout' => '0']);

    $this->get(route('checkout.show'))->assertRedirect(route('login'));
});

it('links the order to a signed-in customer and prefills the form', function () {
    $user = User::factory()->create(['name' => 'Nusrat Jahan', 'email' => 'nusrat@example.com']);
    $this->actingAs($user);
    fillCart($this, checkoutProduct());

    $this->get(route('checkout.show'))->assertOk()->assertSee('Nusrat Jahan')->assertSee('nusrat@example.com');

    $this->post(route('checkout.store'), checkoutDetails())->assertRedirect();

    expect(Order::firstOrFail()->user_id)->toBe($user->id);
});

it('only shows the success page to the person who placed the order', function () {
    fillCart($this, checkoutProduct());
    $this->post(route('checkout.store'), checkoutDetails());
    $order = Order::firstOrFail();

    $this->flushSession();

    $this->get(route('checkout.success', $order->number))->assertNotFound();
});

it('lets an admin move an order along and puts the stock back when it is cancelled', function () {
    $first = checkoutProduct();
    fillCart($this, $first, 2);
    $this->post(route('checkout.store'), checkoutDetails());

    $second = checkoutProduct();
    fillCart($this, $second, 2);
    $this->post(route('checkout.store'), checkoutDetails());

    [$delivered, $cancelled] = Order::orderBy('id')->get()->all();

    expect($second->fresh()->stock)->toBe(8);

    $admin = Admin::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => 'secret-pass-1']);
    $this->actingAs($admin, 'admin');

    $this->get(route('admin.orders.index'))->assertOk()->assertSee($delivered->number);
    $this->get(route('admin.orders.show', $delivered))->assertOk()->assertSee('Rahim Uddin');

    $this->patch(route('admin.orders.update', $delivered), ['status' => 'delivered', 'courier' => 'pathao', 'tracking_id' => 'PTH-1'])
        ->assertRedirect();

    $delivered->refresh();
    expect($delivered->status)->toBe('delivered')
        ->and($delivered->payment_status)->toBe('paid')
        ->and($delivered->courier)->toBe('pathao')
        ->and($first->fresh()->stock)->toBe(8);

    $this->patch(route('admin.orders.update', $cancelled), ['status' => 'cancelled'])->assertRedirect();

    expect($second->fresh()->stock)->toBe(10)
        ->and($cancelled->fresh()->status)->toBe('cancelled');

    $this->patch(route('admin.orders.update', $cancelled), ['status' => 'pending'])->assertSessionHas('error');
    expect($cancelled->fresh()->status)->toBe('cancelled');
});

it('tracks an order only when the order number and mobile number both match', function () {
    fillCart($this, checkoutProduct());
    $this->post(route('checkout.store'), checkoutDetails());
    $order = Order::firstOrFail();

    $this->get(route('track.show'))->assertOk()->assertSee('Track order');

    $this->post(route('track.lookup'), ['order_number' => $order->number, 'phone' => '+8801711223344'])
        ->assertOk()->assertSee('Order placed')->assertSee($order->number);

    $this->post(route('track.lookup'), ['order_number' => $order->number, 'phone' => '01799999999'])
        ->assertOk()->assertSee('We could not find that order');

    $this->post(route('track.lookup'), ['order_number' => $order->number])->assertSessionHasErrors('phone');
});

it('creates an account for a guest at checkout and reuses it for the same email', function () {
    fillCart($this, checkoutProduct());
    $this->post(route('checkout.store'), checkoutDetails());

    $user = User::where('email', 'rahim@example.com')->firstOrFail();
    $expected = Str::slug((string) Setting::get('store_name'), '').'3344';

    expect(Hash::check($expected, $user->password))->toBeTrue()
        ->and(Order::firstOrFail()->user_id)->toBe($user->id);
    $this->assertGuest();

    fillCart($this, checkoutProduct());
    $this->post(route('checkout.store'), checkoutDetails());

    expect(User::count())->toBe(1)->and(Order::where('user_id', $user->id)->count())->toBe(2);
});
