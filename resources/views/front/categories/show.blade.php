@extends('front.app')

@section('content')
<section class="py-20 px-6 max-w-7xl mx-auto">

<h2 class="text-3xl font-bold mb-10">
    {{ $category->name }}
</h2>
<div class="lg:col-span-9">
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-x-8 gap-y-16">
<!-- Product Card 1 -->
 @foreach ($category->products as $product)


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
<span class="text-primary font-bold text-lg">{{ $product->price }}</span>
</div>

<div class="flex items-center gap-1 text-tertiary text-xs font-bold pt-1">
        ⭐ {{ number_format($product->reviews->avg('rating'), 1) }}
        ({{ $product->reviews->count() }} reviews)


    </div>
</div>
</div>
 @endforeach

</div>



</section>
@endsection
