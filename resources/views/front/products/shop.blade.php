@extends('front.app')
@section('content')
<main class="pt-32 px-6 max-w-7xl mx-auto">
<!-- Search & Filter Layout -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 mb-20">
<!-- Sidebar Filters -->
<aside class="lg:col-span-3 space-y-10">
<div>
<h3 class="font-headline font-bold text-lg mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-primary" data-icon="filter_list">filter_list</span>
                        Refine Selection
                    </h3>
<!-- Search Input -->
<div class="relative mb-10">
<form method="GET" action="{{ route('shop') }}">
    <input name="search" value="{{ request('search') }}"
        class="w-full bg-surface-container border-none py-4 px-6 text-sm"
        placeholder="Search harvest..." type="text"/>
</form>
<span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-outline" data-icon="search">search</span>
</div>
<!-- Filter Groups -->
<div class="space-y-8">
<section>
<h4 class="font-label uppercase text-[11px] font-bold tracking-[0.1em] text-outline mb-4">Fruit Type</h4>
<div class="flex flex-wrap gap-2">
<a href="{{ route('shop') }}"
   class="px-4 py-2 rounded-full text-sm font-medium {{ !request('category') ? 'bg-primary text-white' : 'bg-gray-100' }}">
    All
</a>
@foreach($categories as $category)
<a href="{{ route('shop', ['category' => $category->id]) }}"
   class="px-4 py-2 rounded-full text-sm font-medium
   {{ request('category') == $category->id ? 'bg-primary text-white' : 'bg-gray-100' }}">
    {{ $category->name }}
</a>
@endforeach
</div>
</section>
<section>
<h4 class="font-label uppercase text-[11px] font-bold tracking-[0.1em] text-outline mb-4">Pantry Size</h4>
<div class="space-y-3">
<label class="flex items-center gap-3 cursor-pointer group">
<input class="w-5 h-5 rounded border-outline-variant text-primary focus:ring-primary" type="checkbox"/>
<span class="text-sm font-medium group-hover:text-primary transition-colors">Individual (100g)</span>
</label>
<label class="flex items-center gap-3 cursor-pointer group">
<input class="w-5 h-5 rounded border-outline-variant text-primary focus:ring-primary" type="checkbox"/>
<span class="text-sm font-medium group-hover:text-primary transition-colors">Family Pack (500g)</span>
</label>
<label class="flex items-center gap-3 cursor-pointer group">
<input checked="" class="w-5 h-5 rounded border-outline-variant text-primary focus:ring-primary" type="checkbox"/>
<span class="text-sm font-medium group-hover:text-primary transition-colors">Bulk Harvest (1kg)</span>
</label>
</div>
</section>
<!-- Subtle Promotion Card -->
<div class="bg-tertiary-container/30 p-6 rounded-lg relative overflow-hidden group">
<div class="relative z-10">
<span class="text-tertiary font-bold text-xs uppercase tracking-widest mb-2 block">Monthly Offer</span>
<p class="text-on-tertiary-container font-headline font-bold text-lg leading-tight mb-4">Get 15% off on all Berry Mixes</p>
<button class="text-tertiary font-bold text-sm underline decoration-2 underline-offset-4 hover:text-on-tertiary-container transition-colors">View Selection</button>
</div>
<span class="material-symbols-outlined absolute -bottom-4 -right-4 text-7xl text-tertiary opacity-10 group-hover:scale-110 transition-transform duration-500" data-icon="auto_awesome">auto_awesome</span>
</div>
</div>
</div>
</aside>
<!-- Product Grid Content -->
<div class="lg:col-span-9">
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-x-8 gap-y-16">
<!-- Product Card 1 -->
 @foreach ($products as $product )


<div class="group">
<div class="relative aspect-[4/5] mb-6 rounded-lg bg-surface-container-lowest overflow-hidden transition-all duration-500 hover:shadow-2xl hover:shadow-primary/5">


@php $image = $product->images->first(); @endphp
@if($image)
 <a href="{{ route('front.products.show', $product->id) }}">
    <img
        src="{{ asset('storage/products/' . $image->path) }}"
        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
        data-alt="Close-up of golden sun-dried organic mango slices with natural texture, soft studio lighting, organic earthy background" >
</a>
@else
    <span>لا توجد صورة</span>
@endif
<div class="absolute top-4 left-4 flex flex-col gap-2 items-start">



    @php
    $discount = $product->discounts->where('active', 1)->first();
@endphp

@if($discount)
    <span class="absolute top-2 left-2 bg-red-600 text-white text-[10px] px-2 py-0.5 rounded-full z-10">
        -{{ $discount->value }}{{ $discount->type == 'percentage' ? '%' : 'ج' }}
    </span>
@endif


@if(!$product->isInStock())
    <span class="bg-red-500 text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1.5 rounded-full shadow-md">Out of Stock</span>
@endif
</div>
@if(!$product->isInStock())
    <button disabled class="absolute bottom-6 left-1/2 -translate-x-1/2 translate-y-12 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300 w-[80%] bg-red-500 text-white py-3 rounded-full font-bold text-sm shadow-xl cursor-not-allowed">
        Out of Stock
    </button>
@else
    <button class="add-to-cart-btn absolute bottom-6 left-1/2 -translate-x-1/2 translate-y-12 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300 w-[80%] editorial-gradient text-on-primary py-3 rounded-full font-bold text-sm shadow-xl" data-id="{{ $product->id }}">
        Add to Cart
    </button>
@endif



</div>
<div class="space-y-2 px-2">
<div class="flex justify-between items-start">
<h3 class="font-headline font-bold text-xl group-hover:text-primary transition-colors">{{ $product->name }}</h3>
@php
    $discount = $product->discounts->where('active', 1)->first();

    $price = $product->price;

    if ($discount) {
        if ($discount->type == 'percentage') {
            $price -= ($price * $discount->value / 100);
        } else {
            $price -= $discount->value;
        }
    }
@endphp

<span class="text-primary font-bold text-lg">
    {{ $price }} جنيه
</span>
</div>

<div class="flex items-center gap-1 text-tertiary text-xs font-bold pt-1">
        ⭐ {{ number_format($product->reviews->avg('rating'), 1) }}
        ({{ $product->reviews->count() }} reviews)

                            </div>
</div>
</div>
 @endforeach

</div>
<!-- Pagination -->
<div class="mt-20 flex justify-center">
    {{ $products->links() }}
</div>
</div>
</div>
<!-- Call to Action Section -->
<section class="bg-secondary-container rounded-xl p-8 md:p-16 mb-20 relative overflow-hidden">
<div class="max-w-xl relative z-10">
<h2 class="text-4xl font-headline font-bold text-on-secondary-container mb-6">Join the Orchard Club.</h2>
<p class="text-on-secondary-container/80 text-lg mb-8">Get seasonal harvest updates, recipes, and exclusive first-access to limited batches of rare dried fruits.</p>
<div class="flex flex-col sm:flex-row gap-4">
<input class="flex-1 px-6 py-4 rounded-full bg-white border-none focus:ring-2 focus:ring-primary" placeholder="Your email address" type="email"/>
<button class="px-8 py-4 editorial-gradient text-on-primary rounded-full font-bold shadow-lg hover:scale-105 transition-transform">Subscribe</button>
</div>
</div>
<div class="absolute right-0 bottom-0 top-0 w-1/2 hidden md:block">
<div class="w-full h-full opacity-20 transform translate-x-1/4 translate-y-1/4 rotate-12">
<span class="material-symbols-outlined text-[20rem] text-primary" data-icon="eco">eco</span>
</div>
</div>
</section>
</main>
@endsection
