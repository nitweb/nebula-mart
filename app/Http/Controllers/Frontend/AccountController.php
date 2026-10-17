<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AccountController extends Controller
{
    public function index(Request $request): View
    {
        /** @var User $user */
        $user = $request->user();

        $orders = $user->customerOrders();

        return view('frontend.account.index', [
            'user' => $user,
            'recentOrders' => (clone $orders)->with('items')->latest('id')->limit(3)->get(),
            'orderCount' => (clone $orders)->count(),
            'activeCount' => (clone $orders)->whereNotIn('status', ['delivered', ...Order::FINAL_STATUSES])->count(),
            'spent' => (float) (clone $orders)->whereNotIn('status', Order::FINAL_STATUSES)->sum('total'),
            'wishlistCount' => $user->wishlists()->count(),
            'address' => $user->addresses()->first(),
        ]);
    }

    public function profile(Request $request): View
    {
        return view('frontend.account.profile', ['user' => $request->user()]);
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        /** @var User $user */
        $user = $request->user();

        $request->merge([
            'phone' => User::normalizePhone($request->input('phone')),
            'email' => strtolower(trim((string) $request->input('email'))),
        ]);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'regex:/^01[3-9][0-9]{8}$/', Rule::unique('users', 'phone')->ignore($user->id)],
            'email' => ['required', 'email', 'max:150', Rule::unique('users', 'email')->ignore($user->id)],
        ], [
            'phone.regex' => 'Enter a valid mobile number, like 01XXXXXXXXX.',
            'phone.unique' => 'This mobile number already belongs to another account.',
            'email.unique' => 'This email address already belongs to another account.',
        ], [
            'phone' => 'mobile number',
            'email' => 'email address',
        ]);

        $user->update([
            'name' => trim($data['name']),
            'phone' => $data['phone'],
            'email' => $data['email'],
        ]);

        return back()->with('status', 'Your details have been updated.');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $data = $request->validateWithBag('password', [
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'max:100', 'confirmed'],
        ], [], ['current_password' => 'current password']);

        $user = $request->user();

        if (! Hash::check($data['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is not correct.'], 'password');
        }

        $user->update(['password' => $data['password']]);

        return back()->with('status', 'Your password has been changed.');
    }
}
