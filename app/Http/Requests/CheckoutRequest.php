<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Services\CheckoutService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CheckoutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'phone' => User::normalizePhone($this->input('phone')),
            'name' => trim((string) $this->input('name')),
            'email' => trim((string) $this->input('email')),
            'district' => trim((string) $this->input('district')),
            'area' => trim((string) $this->input('area_txt', $this->input('area'))),
        ]);
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'regex:/^01[3-9][0-9]{8}$/'],
            'email' => ['required', 'email', 'max:150'],
            'district' => ['required', Rule::in(CheckoutService::districts())],
            'area' => ['required', 'string', 'max:120'],
            'address' => ['required', 'string', 'max:500'],
            'note' => ['nullable', 'string', 'max:500'],
            'pay' => ['required', Rule::in(['cod'])],
            'terms' => ['accepted'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'phone.regex' => 'Enter a valid mobile number, like 01XXXXXXXXX.',
            'district.in' => 'Please select a district from the list.',
            'area.required' => 'Please enter your area or thana.',
            'terms.accepted' => 'Please accept the terms to place your order.',
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'full name',
            'phone' => 'mobile number',
            'email' => 'email address',
            'address' => 'full address',
        ];
    }
}
