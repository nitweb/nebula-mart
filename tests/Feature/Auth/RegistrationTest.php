<?php

use App\Models\User;

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200)->assertSee('Create account');
});

test('new users can register with a mobile number', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'phone' => '01811223344',
        'email' => 'test@example.com',
        'password' => 'password',
        'terms' => '1',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('account.index', absolute: false));

    expect(User::where('phone', '01811223344')->exists())->toBeTrue();
});

test('a mobile number that already has an account cannot register again', function () {
    User::factory()->create(['phone' => '01811223344']);

    $this->post('/register', [
        'name' => 'Someone Else',
        'phone' => '+8801811223344',
        'email' => 'other@example.com',
        'password' => 'password',
        'terms' => '1',
    ])->assertSessionHasErrors(['phone' => 'This mobile number already has an account. Please sign in.']);

    $this->assertGuest();
    expect(User::count())->toBe(1);
});
