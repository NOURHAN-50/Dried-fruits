<div class="row">
    <div class="col-md-6">
        <h6 class="text-primary mb-3">معلومات العميل</h6>
        <table class="table table-sm table-borderless">
            <tr>
                <th style="width: 120px;">الاسم:</th>
                <td>{{ $order->customer_name }}</td>
            </tr>
            <tr>
                <th>رقم الهاتف:</th>
                <td>{{ $order->phone }}</td>
            </tr>
            <tr>
                <th>العنوان:</th>
                <td>{{ $order->address }}</td>
            </tr>
            @if($order->notes)
            <tr>
                <th>ملاحظات:</th>
                <td>{{ $order->notes }}</td>
            </tr>
            @endif
        </table>
    </div>
    <div class="col-md-6">
        <h6 class="text-primary mb-3">معلومات الدفع</h6>
        <table class="table table-sm table-borderless">
            <tr>
                <th style="width: 120px;">طريقة الدفع:</th>
                <td>
                    @if($order->payment)
                        {{ str_replace('_', ' ', ucfirst($order->payment->payment_method)) }}
                    @else
                        غير متوفر
                    @endif
                </td>
            </tr>
            <tr>
                <th>حالة الدفع:</th>
                <td>
                    @if($order->payment)
                        <span class="badge badge-{{ $order->payment->status == 'completed' ? 'success' : ($order->payment->status == 'failed' ? 'danger' : 'warning') }}">
                            {{ $order->payment->status }}
                        </span>
                    @else
                        غير متوفر
                    @endif
                </td>
            </tr>
            <tr>
                <th>تاريخ الطلب:</th>
                <td>{{ $order->created_at->format('Y-m-d h:i A') }}</td>
            </tr>
        </table>
    </div>
</div>

<h6 class="text-primary mt-4 mb-3">تفاصيل المنتجات</h6>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>المنتج</th>
                <th>السعر</th>
                <th>الكمية</th>
                <th>الإجمالي</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product ? $item->product->name : 'منتج محذوف' }}</td>
                <td>{{ number_format($item->unit_price, 2) }} EGP</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->unit_price * $item->quantity, 2) }} EGP</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            @if($order->discount_total > 0)
            <tr>
                <td colspan="3" class="text-right"><strong>الخصم:</strong></td>
                <td>-{{ number_format($order->discount_total, 2) }} EGP</td>
            </tr>
            @endif
            <tr>
                <td colspan="3" class="text-right"><strong>رسوم الشحن:</strong></td>
                <td>{{ number_format($order->shipping_price, 2) }} EGP</td>
            </tr>
            <tr>
                <td colspan="3" class="text-right"><strong>الإجمالي الكلي:</strong></td>
                <td><strong>{{ number_format($order->total_price, 2) }} EGP</strong></td>
            </tr>
        </tfoot>
    </table>
</div>
