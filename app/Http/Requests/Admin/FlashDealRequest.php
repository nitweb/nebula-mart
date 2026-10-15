<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FlashDealRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $products = collect((array) $this->input('products', []))
            ->filter(fn ($row) => is_array($row))
            ->map(fn (array $row) => [
                'product_id' => $row['product_id'] ?? null,
                'discount_percent' => ($row['discount_percent'] ?? '') === '' ? 0 : $row['discount_percent'],
                'deal_stock' => ($row['deal_stock'] ?? '') === '' ? null : $row['deal_stock'],
            ])
            ->values()
            ->all();

        $this->merge([
            'repeat_daily' => $this->boolean('repeat_daily'),
            'show_on_home' => $this->boolean('show_on_home'),
            'show_countdown' => $this->boolean('show_countdown'),
            'is_active' => $this->boolean('is_active'),
            'products' => $products,
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:160'],
            'starts_at' => ['required', 'date'],
            'ends_at' => ['required', 'date', 'after:starts_at'],
            'repeat_daily' => ['boolean'],
            'show_on_home' => ['boolean'],
            'show_countdown' => ['boolean'],
            'is_active' => ['boolean'],
            'products' => ['required', 'array', 'min:1', 'max:100'],
            'products.*.product_id' => ['required', 'integer', 'distinct', Rule::exists('products', 'id')],
            'products.*.discount_percent' => ['required', 'numeric', 'min:0', 'max:95'],
            'products.*.deal_stock' => ['nullable', 'integer', 'min:0', 'max:1000000'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'products.required' => 'Add at least one product to the deal.',
            'products.min' => 'Add at least one product to the deal.',
            'products.*.product_id.distinct' => 'A product can only be added once.',
            'ends_at.after' => 'The end time must be after the start time.',
        ];
    }
}
