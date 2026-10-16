<?php

namespace App\Http\Requests\Admin;

use App\Models\Coupon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CouponRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $blank = fn (string $key) => $this->input($key) === null || $this->input($key) === '' ? null : $this->input($key);

        $this->merge([
            'code' => Coupon::normalizeCode($this->input('code')),
            'value' => $this->input('type') === 'free_delivery' ? 0 : ($blank('value') ?? 0),
            'max_discount' => $blank('max_discount'),
            'min_order' => $blank('min_order'),
            'usage_limit' => $blank('usage_limit'),
            'per_customer_limit' => $blank('per_customer_limit'),
            'starts_at' => $blank('starts_at'),
            'expires_at' => $blank('expires_at'),
            'is_active' => $this->boolean('is_active'),
            'show_on_checkout' => $this->boolean('show_on_checkout'),
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $coupon = $this->route('coupon');

        return [
            'code' => ['required', 'string', 'max:40', 'regex:/^[A-Z0-9_-]+$/', Rule::unique('coupons', 'code')->ignore($coupon?->id)],
            'type' => ['required', Rule::in(array_keys(Coupon::TYPES))],
            'value' => [
                'required', 'numeric', 'min:0',
                Rule::when($this->input('type') === 'percentage', ['max:100']),
                Rule::when($this->input('type') !== 'free_delivery', ['gt:0']),
            ],
            'max_discount' => ['nullable', 'numeric', 'min:0'],
            'min_order' => ['nullable', 'numeric', 'min:0'],
            'usage_limit' => ['nullable', 'integer', 'min:1'],
            'per_customer_limit' => ['nullable', 'integer', 'min:1'],
            'applies_to' => ['required', Rule::in(array_keys(Coupon::SCOPES))],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['integer', 'exists:categories,id'],
            'products' => ['nullable', 'array'],
            'products.*' => ['integer', 'exists:products,id'],
            'description' => ['nullable', 'string', 'max:500'],
            'starts_at' => ['nullable', 'date'],
            'expires_at' => ['nullable', 'date', Rule::when($this->filled('starts_at'), ['after_or_equal:starts_at'])],
            'is_active' => ['boolean'],
            'show_on_checkout' => ['boolean'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'code.regex' => 'Use only letters, numbers, dashes and underscores.',
            'value.gt' => 'The discount value must be greater than zero.',
        ];
    }
}
