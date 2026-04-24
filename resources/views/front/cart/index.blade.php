@extends('front.app')
@section('content')
<main class="max-w-7xl mx-auto px-8 py-12">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
<!-- Left Column: Cart & Details -->
<div class="lg:col-span-7 space-y-12">
<!-- Section 1: Shopping Cart Items -->
<section>
<h1 class="text-4xl font-extrabold text-on-surface mb-8 tracking-tight">Your Cart</h1>
<div class="space-y-6">
    @foreach($cart as $id => $item)


<!-- Item 1 -->
<div class="flex flex-col sm:flex-row gap-6 p-6 bg-surface-container-lowest rounded-lg transition-transform duration-300 hover:scale-[1.01]">
<div class="w-24 h-24 sm:w-32 sm:h-32 rounded-lg bg-stone-100 overflow-hidden flex-shrink-0">
@if(!empty($item['image']))
    <a href="{{ route('front.products.show', $id) }}">
        <img
            src="{{ asset('storage/products/' . $item['image']) }}"
            class="w-full h-full object-cover"
        >
    </a>
@else
    <span>لا توجد صورة</span>
@endif
</div>
<div class="flex-grow flex flex-col justify-between">
<div class="flex justify-between items-start">
<div>
<h3 class="text-xl font-bold text-on-surface">{{ $item['name']  }}</h3>
<p class="text-sm text-stone-500 font-medium uppercase tracking-wider mt-1">Pack of 6</p>
</div>
<span class="text-xl font-bold text-primary"
      id="price-{{ $id }}"
      data-unit="{{ $item['price'] }}"> {{ $item['price'] * $item['quantity'] }}</span>
</div>
<div class="flex justify-between items-center mt-4">
<div class="flex items-center bg-surface-container rounded-full p-1">
    <button type="button"
        class="decrease-btn w-8 h-8 flex items-center justify-center hover:bg-white rounded-full transition-colors"
        data-id="{{ $id }}">
        <span class="material-symbols-outlined text-sm">remove</span>
    </button>
    <span class="px-4 font-bold" id="qty-{{ $id }}">
        {{ $item['quantity'] }}
    </span>
    <button type="button"
        class="increase-btn w-8 h-8 flex items-center justify-center hover:bg-white rounded-full transition-colors"
        data-id="{{ $id }}">
        <span class="material-symbols-outlined text-sm">add</span>
    </button>
</div>
  <form action=" {{ route('cart.remove',$id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
<button class="text-stone-400 hover:text-error transition-colors">
<span class="material-symbols-outlined" data-icon="delete">delete</span>
</button>
</form>
</div>
</div>
</div>
  @endforeach
</div>

</section>
<!-- Section 2: Shipping Information -->

<!-- Section 3: Payment Options -->

<!-- Right Column: Order Summary (Sticky) -->
<div class="lg:col-span-5 lg:sticky lg:top-12">
<div class="bg-surface-container-lowest p-8 lg:p-10 rounded-xl shadow-[0_20px_40px_rgba(0,0,0,0.04)]">
<h2 class="text-2xl font-bold text-on-surface mb-8 tracking-tight">Order Summary</h2>
<div class="space-y-4 mb-8">
<div class="flex justify-between items-center text-on-surface-variant">
<span>Subtotal</span>
<span class="font-bold" id="subtotal">{{ $subtotal  }}</span>
</div>
<div class="pt-4 border-t border-stone-100 flex justify-between items-center text-2xl font-extrabold text-on-surface">
<span>Total</span>
<span id="total">{{ $subtotal }}</span>
</div>
</div>
<div class="space-y-4">
<a href="{{ route('checkout') }}" class="w-full py-5 bg-gradient-to-r from-primary to-primary-container text-white font-bold text-lg rounded-full shadow-lg hover:scale-[1.02] active:scale-95 transition-all duration-300">
Proceed to Checkout
</a>
</div>
</div>
</div>

</div>
</main>


@endsection
