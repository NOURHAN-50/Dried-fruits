<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:price',
            'category_id' => 'required|exists:categories,id',
            'main_stock' => 'required|integer|min:0',
            'status' => 'required|in:متاح,غير متاح',
            'cost_price'=>'required|numeric|min:0'

            //
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'اسم المنتج مطلوب.',
            'description.required' => 'الوصف التفصيلي مطلوب.',
            'price.required' => 'السعر الأساسي مطلوب.',
            'price.numeric' => 'السعر الأساسي يجب أن يكون رقمًا.',
            'price.min' => 'السعر الأساسي لا يمكن أن يكون سالبًا.',
            'sale_price.numeric' => 'السعر قبل التخفيض يجب أن يكون رقمًا.',
            'sale_price.min' => 'السعر قبل التخفيض لا يمكن أن يكون سالبًا.',
            'sale_price.lt' => 'السعر قبل التخفيض يجب أن يكون أقل من السعر الأساسي.',
            'category_id.required' => 'الفئة مطلوبة.',
            'category_id.exists' => 'الفئة المحددة غير موجودة.',
            'stock.required' => 'المخزون مطلوب.',
            'stock.integer' => 'المخزون يجب أن يكون عددًا صحيحًا.',
            'stock.min' => 'المخزون لا يمكن أن يكون سالبًا.',
            'status.required' => 'الحالة مطلوبة.',
            'status.in' => 'الحالة يجب أن تكون إما "متاح" أو "غير متاح".',
            'cost_price'=>'السعر الأساسي مطلوب.'
        ];
    }
}
