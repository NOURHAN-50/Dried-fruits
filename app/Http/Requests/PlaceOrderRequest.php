<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PlaceOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customer_name' => 'required|string|min:3',
            'phone' => 'required|digits_between:8,15|regex:/^[0-9]+$/',
            'address' => 'required|string|min:5',
            'shipping_zone_id' => 'required|exists:shipping_zones,id',
            'payment_method' => 'required|in:cod,online,instapay',
            ];
    }

    public function messages(): array
    {
        return [
            'customer_name.required' => 'الاسم مطلوب',
            'phone.required' => 'رقم الهاتف مطلوب',
'           phone.digits_between' => 'رقم الهاتف يجب أن يكون بين 8 و15 رقم',
            'phone.regex' => 'رقم الهاتف يجب أن يحتوي على أرقام فقط',
            'address.required' => 'العنوان مطلوب',
            'shipping_zone_id.required' => 'اختار المدينة',
            'payment_method.required' => 'اختاري طريقة الدفع',
            'payment_method.in' => 'طريقة الدفع غير صحيحة',
        ];
    }
}
