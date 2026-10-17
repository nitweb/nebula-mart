<?php

use App\Models\User;

test('login screen can be rendered', function () {
    $response = $this->get('/login');

    $response->assertStatus(200)->assertSee('Mobile number');
});

test('users can authenticate with their mobile number', function () {
    $user = User::factory()->create(['phone' => '01711223344']);

    $response = $this->post('/login', [
        'phone' => '+8801711223344',
        'password' => 'password',
    ]);

    $this->assertAuthenticatedAs($user);
    $response->assertRedirect(route('account.index', absolute: false));
});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    $this->post('/login', [
        'phone' => $user->phone,
        'password' => 'wrong-password',
    ])->assertSessionHasErrors('phone');

    $this->assertGuest();
});

test('the old email login no longer works', function () {
    $user = User::factory()->create();

    $this->post('/login', ['email' => $user->email, 'password' => 'password'])->assertSessionHasErrors('phone');

    $this->assertGuest();
});

test('users can logout', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/logout');

    $this->assertGuest();
    $response->assertRedirect('/');
});

test('a signed-in customer is sent from the login page to their account', function () {
    $this->actingAs(User::factory()->create())->get('/login')->assertRedirect(route('account.index'));
});
