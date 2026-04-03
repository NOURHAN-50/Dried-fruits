<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class updatdiscountRequest extends FormRequest
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
            'code' => 'required|unique:discounts,code,' . $this->route('id'),
            'type' => 'required|in:percentage,fixed',
            'value' => 'required|numeric|min:0',
            'expires_at' => 'nullable|date|after:today',
            'usage_limit' => 'nullable|integer|min:0',
            'active' => 'boolean'
            //
        ];
    }
    public function messages(): array
    {
        return [
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
