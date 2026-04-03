<?php

namespace App\Services;

use App\Models\Discount;


class DiscountService
{
    public function applyDiscount($code, $cartTotal)
    {
        $discount = Discount::where('code', $code)
            ->where('active', 1)
            ->first();

        if (!$discount) {
            return [
                'status' => false,
                'message' => 'الكوبون غير صالح'
            ];
        }

        if ($discount->expires_at && $discount->expires_at < now()) {
            return [
                'status' => false,
                'message' => 'الكوبون انتهت صلاحيته'
            ];
        }

        if ($discount->type == 'percentage') {
            $discountAmount = $cartTotal * ($discount->value / 100);
        } else {
            $discountAmount = $discount->value;
        }

        $finalTotal = $cartTotal - $discountAmount;

        return [
            'status' => true,
            'discount' => $discountAmount,
            'total' => $finalTotal
        ];
    }
}
