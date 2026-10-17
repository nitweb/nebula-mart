<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(Request $request): View
    {
        $term = trim((string) $request->query('q', ''));

        $customers = User::query()
            ->with(['orders' => fn ($orders) => $orders->with('items:id,order_id,name,variant_label,quantity')->latest('id')->limit(5)])
            ->withCount('orders')
            ->withSum('orders', 'total')
            ->addSelect(['phone' => \App\Models\Order::select('phone')->whereColumn('user_id', 'users.id')->latest('id')->limit(1)])
            ->when($term !== '', function ($query) use ($term) {
                $like = '%'.addcslashes($term, '%_\\').'%';

                $query->where(fn ($inner) => $inner
                    ->where('name', 'like', $like)
                    ->orWhere('email', 'like', $like)
                    ->orWhereHas('orders', fn ($orders) => $orders->where('phone', 'like', $like)));
            })
            ->latest('id')
            ->paginate(15)
            ->withQueryString();

        return view('admin.customers.index', ['customers' => $customers, 'term' => $term]);
    }
}
