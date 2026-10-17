<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TrackController extends Controller
{
    public function show(): View
    {
        return view('frontend.track.index', ['order' => null, 'searched' => false]);
    }

    public function lookup(Request $request): View
    {
        $request->validate([
            'order_number' => ['required', 'string', 'max:30'],
            'phone' => ['required', 'string', 'max:20'],
        ], [], ['order_number' => 'order number', 'phone' => 'mobile number']);

        $number = strtoupper(preg_replace('/\s+/', '', (string) $request->input('order_number')));
        $number = preg_match('/^\d+$/', $number) ? 'NM-'.$number : $number;

        $phone = User::normalizePhone($request->input('phone'));

        $order = Order::query()
            ->with('events')
            ->where('number', $number)
            ->where('phone', $phone)
            ->first();

        return view('frontend.track.index', ['order' => $order, 'searched' => true]);
    }
}
