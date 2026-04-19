<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreDiscountRequest extends FormRequest
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

'code' => 'required|unique:discounts,code',

'type' => 'required|in:percentage,fixed',

'value' => 'required|numeric|min:1',

'min_order_amount' => 'nullable|numeric',

'usage_limit' => 'nullable|integer',

'starts_at' => 'nullable|date',

'expires_at' => 'nullable|date|after:starts_at',

'target_type' => 'required|in:order,product',

'target_id' => 'nullable|exists:products,id',

'active' => 'boolean',

];


    }
    public function messages(): array
    {
        return [
            'name.required' => 'اسم الخصم مطلوب.',
            'name.string' => 'اسم الخصم يجب أن يكون نصًا.',
            'name.max' => 'اسم الخصم لا يجب أن يتجاوز 255 حرفًا.',
            'code.required' => 'كود الخصم مطلوب.',
            'code.unique' => 'كود الخصم مستخدم بالفعل. يرجى اختيار كود آخر.',
            'type.required' => 'نوع الخصم مطلوب.',
            'type.in' => 'نوع الخصم غير صالح. يجب أن يكون "percentage" أو "fixed".',
            'value.required' => 'قيمة الخصم مطلوبة.',
            'value.numeric' => 'قيمة الخصم يجب أن تكون رقمًا.',
            'value.min' => 'قيمة الخصم يجب أن تكون 0 أو أكثر.',
            'expires_at.date' => 'تاريخ الانتهاء يجب أن يكون تاريخًا صالحًا.',
            'expires_at.after' => 'تاريخ الانتهاء يجب أن يكون بعد اليوم.',
            'usage_limit.integer' => 'الحد الأقصى للاستخدام يجب أن يكون عددًا صحيحًا.',
            'usage_limit.min' => 'الحد الأقصى للاستخدام يجب أن يكون 0 أو أكثر.',
            'active.boolean' => 'حالة التفعيل يجب أن تكون صحيحة أو خاطئة.'
        ];
    }
}
