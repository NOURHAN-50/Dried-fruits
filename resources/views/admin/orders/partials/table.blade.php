<tbody>
@foreach ($orders as $order)
@php
    switch($order->status){
        case 'pending': $class='warning'; break;
        case 'processing': $class='info'; break;
        case 'shipped': $class='primary'; break;
        case 'completed': $class='success'; break;
        case 'cancelled': $class='danger'; break;
        default: $class='secondary'; break;
    }
@endphp
<tr>
    <td><strong>{{ $order->id }}</strong></td>
    <td>{{ $order->customer_name }}</td>
    <td>{{ $order->created_at->format('d/m/Y') }}</td>
    <td>{{ number_format($order->total_price,2) }} EGP</td>
    <td>{{ $order->payment->payment_method ?? 'N/A' }}</td>
    <td><span class="badge badge-{{ $class }}">{{ $order->status }}</span></td>
    <td>
        <button class="btn btn-sm btn-primary view-details" data-order='@json($order)'>
            عرض التفاصيل
        </button>
    </td>
</tr>
@endforeach
</tbody>
