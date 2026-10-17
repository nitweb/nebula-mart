<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use App\Services\CheckoutService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AddressController extends Controller
{
    public function index(Request $request): View
    {
        return view('frontend.account.addresses', [
            'addresses' => $request->user()->addresses()->get(),
            'user' => $request->user(),
            'limit' => Address::LIMIT,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $user = $request->user();

        if ($user->addresses()->count() >= Address::LIMIT) {
            return back()->with('error', 'You can save up to '.Address::LIMIT.' addresses. Please remove one first.');
        }

        $data = $this->validated($request);
        $makeDefault = $request->boolean('is_default') || ! $user->addresses()->exists();

        $address = $user->addresses()->create($data + ['is_default' => false]);

        if ($makeDefault) {
            $this->makeDefault($user, $address);
        }

        return to_route('account.addresses')->with('status', 'Address saved.');
    }

    public function update(Request $request, Address $address): RedirectResponse
    {
        abort_unless($address->user_id === $request->user()->id, 404);

        $address->update($this->validated($request));

        if ($request->boolean('is_default')) {
            $this->makeDefault($request->user(), $address);
        }

        return to_route('account.addresses')->with('status', 'Address updated.');
    }

    public function default(Request $request, Address $address): RedirectResponse
    {
        abort_unless($address->user_id === $request->user()->id, 404);

        $this->makeDefault($request->user(), $address);

        return back()->with('status', 'Default address changed.');
    }

    public function destroy(Request $request, Address $address): RedirectResponse
    {
        abort_unless($address->user_id === $request->user()->id, 404);

        $wasDefault = $address->is_default;
        $address->delete();

        if ($wasDefault && ($next = $request->user()->addresses()->first())) {
            $this->makeDefault($request->user(), $next);
        }

        return back()->with('status', 'Address removed.');
    }

    private function makeDefault(User $user, Address $address): void
    {
        $user->addresses()->where('id', '!=', $address->id)->update(['is_default' => false]);
        $address->update(['is_default' => true]);
    }

    /** @return array{label: string, name: string, phone: string, district: string, area: string, address: string} */
    private function validated(Request $request): array
    {
        $request->merge(['phone' => User::normalizePhone($request->input('phone'))]);

        return $request->validate([
            'label' => ['required', 'string', 'max:30'],
            'name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'regex:/^01[3-9][0-9]{8}$/'],
            'district' => ['required', Rule::in(CheckoutService::districts())],
            'area' => ['required', 'string', 'max:120'],
            'address' => ['required', 'string', 'max:500'],
        ], [
            'phone.regex' => 'Enter a valid mobile number, like 01XXXXXXXXX.',
            'district.in' => 'Please select a district from the list.',
        ], [
            'phone' => 'mobile number',
            'label' => 'address name',
            'name' => 'full name',
            'address' => 'full address',
        ]);
    }
}
