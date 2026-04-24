@extends('front.app')
@section('content')

<main class="pt-32 text-center">

    <div class="max-w-xl mx-auto bg-white p-10 rounded-2xl shadow">

        <h1 class="text-3xl font-bold text-green-600 mb-4">
            🎉 Order Placed Successfully!
        </h1>

        <p class="text-gray-500 mb-6">
            Your order #{{ $order->id }} has been received.
        </p>

        <p class="font-bold text-lg">
            Total: {{ $order->total_price }} جنيه
        </p>

        <a href="{{ route('shop') }}"
           class="mt-6 inline-block bg-green-600 text-white px-6 py-3 rounded-full">
            Continue Shopping
        </a>

    </div>

</main>
@endsection

