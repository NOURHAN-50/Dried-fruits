@extends('front.app')

@section('content')
<section class="px-4 py-16 bg-surface-container-low">
    <div class="max-w-7xl mx-auto">

        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
            <div>
                <h2 class="text-4xl font-bold tracking-tight text-on-surface">Flash Deals</h2>
                <p class="text-on-surface-variant mt-2">
                    Blink and they're gone. Curated selections at deep discounts.
                </p>
            </div>

            <!-- Countdown (اختياري ثابت أو JS بعدين) -->
            <div class="flex items-center gap-4 bg-surface-container-lowest p-2 px-6 rounded-full shadow-sm">
                <span class="text-xs uppercase font-bold tracking-widest text-primary">Ends In</span>
                <div class="flex gap-3 text-2xl font-bold font-display text-tertiary">
                    <span>04</span><span class="text-stone-300">:</span>
                    <span>12</span><span class="text-stone-300">:</span>
                    <span>59</span>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

@forelse($offers as $product)

    @php
        $image = $product->images->first();
        $discount = $product->discounts->where('active', 1)->first();

        $finalPrice = $product->price;

        if ($discount) {
            if ($discount->type == 'percentage') {
                $finalPrice -= ($product->price * $discount->value / 100);
            } else {
                $finalPrice -= $discount->value;
            }
        }
    @endphp

    <div class="group">

        <!-- IMAGE -->
        <div class="relative aspect-[4/5] mb-6 rounded-lg overflow-hidden bg-surface-container-lowest">

            @if($image)
                <a href="{{ route('front.products.show', $product->id) }}">
                    <img src="{{ asset('storage/products/' . $image->path) }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </a>
            @endif

            <!-- BADGE -->
            <div class="absolute top-4 left-4 flex flex-col gap-2">

                @if($discount)
                    <span class="bg-red-500 text-white text-[10px] px-2 py-1 rounded-full">
                        -{{ $discount->value }}{{ $discount->type == 'percentage' ? '%' : ' EGP' }}
                    </span>
                @endif

                @if(!$product->isInStock())
                    <span class="bg-black text-white text-[10px] px-3 py-1 rounded-full">
                        Out of Stock
                    </span>
                @endif

            </div>

            <!-- ADD TO CART -->
            @if($product->isInStock())
                <button class="add-to-cart-btn absolute bottom-6 left-1/2 -translate-x-1/2 opacity-0 group-hover:opacity-100 transition w-[80%] bg-primary text-white py-3 rounded-full"
                        data-id="{{ $product->id }}">
                    Add to Cart
                </button>
            @endif

        </div>

        <!-- INFO -->
        <div class="space-y-2 px-2">

            <h3 class="text-xl font-bold">{{ $product->name }}</h3>

            <p class="text-sm text-gray-500">
                {{ Str::limit($product->description, 40) }}
            </p>

            <!-- PRICE -->
            <div class="flex items-center gap-2">

                <span class="text-2xl font-bold text-primary">
                    {{ number_format($finalPrice, 2) }} جنيه
                </span>

                @if($discount)
                    <span class="text-sm line-through text-gray-400">
                        {{ number_format($product->price, 2) }}
                    </span>
                @endif

            </div>

            <!-- REVIEWS -->
<div class="flex items-center gap-1 text-tertiary text-xs font-bold pt-1">
        ⭐ {{ number_format($product->reviews->avg('rating'), 1) }}
        ({{ $product->reviews->count() }} reviews)

                            </div>

        </div>
    </div>

@empty
    <div class="col-span-3 text-center py-10">
        <h3 class="text-2xl font-bold text-gray-500">
            No offers available right now 😢
        </h3>
    </div>

@endforelse

        </div>
    </div>
</section>
@endsection
