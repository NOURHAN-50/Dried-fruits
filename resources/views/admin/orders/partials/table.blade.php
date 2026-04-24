@foreach ($orders as $order)
@php
    switch($order->status){
        case 'pending': $class='warning'; break;
        case 'processing': $class='info'; break;
        case 'shipped': $class='primary'; break;
        case 'delivered': $class='success'; break;
        case 'cancelled': $class='danger'; break;
        default: $class='secondary'; break;
    }
@endphp
<tr data-status="{{ $order->status }}">
    <td><strong>{{ $order->id }}</strong></td>
    <td>{{ $order->customer_name }}</td>
    <td>{{ $order->created_at->format('d/m/Y') }}</td>
    <td>{{ number_format($order->total_price,2) }} EGP</td>
    <td>
        @if($order->payment)
            @if($order->payment->payment_method === 'instapay')
                <span class="badge badge-success">InstaPay</span>
            @else
                <span class="badge badge-secondary">{{ str_replace('_', ' ', ucfirst($order->payment->payment_method)) }}</span>
            @endif
        @else
            N/A
        @endif
    </td>
    <td>
        <span id="orderStatusText-{{ $order->id }}" class="badge badge-{{ $class }}">
            {{ $order->status }}
        </span>
    </td>
    <td>
        <button class="btn btn-sm btn-primary view-details" data-id="{{ $order->id }}">
            عرض التفاصيل
        </button>
    </td>
</tr>
@endforeach
