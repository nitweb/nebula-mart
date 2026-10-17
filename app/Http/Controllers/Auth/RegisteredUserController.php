<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('frontend.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->merge([
            'phone' => User::normalizePhone($request->input('phone')),
            'email' => strtolower(trim((string) $request->input('email'))),
        ]);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'regex:/^01[3-9][0-9]{8}$/', 'unique:users,phone'],
            'email' => ['required', 'email', 'max:150', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:100'],
            'terms' => ['accepted'],
        ], [
            'phone.regex' => 'Enter a valid mobile number, like 01XXXXXXXXX.',
            'phone.unique' => 'This mobile number already has an account. Please sign in.',
            'email.unique' => 'This email address is already used by another account.',
            'terms.accepted' => 'Please accept the terms to create your account.',
        ], [
            'phone' => 'mobile number',
            'email' => 'email address',
        ]);

        $user = User::create([
            'name' => trim($data['name']),
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->intended(route('account.index', absolute: false));
    }
}
