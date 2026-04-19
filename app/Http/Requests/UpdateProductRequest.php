<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'discount_price' => 'nullable|numeric|min:0|lt:price',
            'status' => 'required|in:متاح,غير متاح',
            'main_stock'=>'required|numeric|min:0',
             'cost_price'=>'required|numeric|min:0'
            //
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Product name is required.',
            'price.required' => 'main_stock',
            'price.numeric' => 'Product price must be a number.',
            'price.min' => 'Product price must be at least 0.',
            'category_id.required' => 'Product category is required.',
            'category_id.exists' => 'Selected category does not exist.',
            'sale_price.numeric' => 'Discount price must be a number.',
            'sale_price.min' => 'Discount price must be at least 0.',
            'sale_price.lt' => 'Discount price must be less than the regular price.',
            'stock.required' => 'Product stock is required.',
            'stock.integer' => 'Product stock must be an integer.',
            'stock.min' => 'Product stock must be at least 0.',
            'status.required' => 'Product status is required.',
            'status.in' => 'Product status must be either "متاح" or "غير متاح".',
            'cost_price'=>'السعر الأساسي مطلوب.'

        ];
    }
}
