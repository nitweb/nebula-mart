<?php

namespace App\Listeners;

use App\Services\CartService;
use Illuminate\Auth\Events\Login;

class MergeGuestCart
{
    public function __construct(private CartService $cart) {}

    public function handle(Login $event): void
    {
        if ($event->guard !== 'web') {
            return;
        }

        $this->cart->mergeGuestCart((int) $event->user->getAuthIdentifier());
    }
}
