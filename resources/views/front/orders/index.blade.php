@extends('front.app')
@section('content')
<main class="pt-32 pb-20 px-4 md:px-8 max-w-5xl mx-auto min-h-screen">
<!-- Header Section -->
<header class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-4">
<div>
<span class="text-xs font-bold tracking-[0.05rem] uppercase text-primary mb-2 block">Personal Dashboard</span>
<h1 class="text-4xl md:text-5xl font-display font-extrabold text-on-surface tracking-tight">My Orders <span class="text-primary/40 font-normal">طلباتي</span></h1>
</div>
<div class="flex gap-2">
<span class="px-4 py-2 bg-surface-container-lowest text-stone-500 rounded-full text-sm font-medium border border-outline-variant/15">Active ({{ $activeCount }})</span>
<span class="px-4 py-2 bg-surface-container-lowest text-stone-500 rounded-full text-sm font-medium border border-outline-variant/15">Completed ({{ $completedCount }})</span>
</div>
</header>
<!-- Order Cards List -->
<div class="flex flex-col gap-8">
<!-- Order Card 1: Processing -->
@forelse ($orders as $order)

<div class="group bg-surface-container-lowest rounded-xl overflow-hidden border border-outline-variant/10">

    <div class="p-6 md:p-8 flex justify-between border-b">
        <div>
            <div class="flex items-center gap-3">
                <span class="font-bold">#ORD-{{ $order->id }}</span>

                <span class="px-3 py-1 rounded-full text-xs font-bold
                    @if($order->status == 'processing') bg-orange-50 text-orange-600
                    @elseif($order->status == 'shipped') bg-blue-50 text-blue-600
                    @else bg-emerald-50 text-emerald-600 @endif
                ">
                    {{ ucfirst($order->status) }}
                </span>
            </div>

            <p class="text-sm text-gray-400">
                {{ $order->created_at->format('Y-m-d') }}
            </p>
        </div>

        <div class="text-right">
            <p class="text-xs text-gray-400">Total Amount</p>
            <p class="font-bold text-[#47664b]">
                جنيه{{ $order->total_price }}
            </p>
        </div>
    </div>

    {{-- items --}}
    <div class="p-6 space-y-4">
        @foreach($order->items as $item)
        <div class="flex items-center gap-4">

            <div class="w-16 h-16 rounded overflow-hidden">
@if($item->product->images->first())
    <a href="{{ route('front.products.show', $item->product->id) }}">
        <img src="{{ asset('storage/products/' . $item->product->images->first()->path) }}">
    </a>
@else
    <span>No image</span>
@endif
  </div>

            <div class="flex-1">
                <h4 class="font-bold">{{ $item->product->name }}</h4>
                <p class="text-sm text-gray-400">Qty: {{ $item->quantity }}</p>
            </div>

            <div class="font-bold">
                جنيه{{ $item->unit_price * $item->quantity }}
            </div>

        </div>
        @endforeach
    </div>

</div>

@empty
    <div class="text-center py-20 text-gray-400">
        No orders yet 😢
    </div>
@endforelse




</main>

@endsection
