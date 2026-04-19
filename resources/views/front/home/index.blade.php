@extends('front.app')

@section('hero')
<!-- Hero Section -->
<section class="pt-32 pb-20 px-6 max-w-7xl mx-auto overflow-hidden">
<div class="relative flex flex-col md:flex-row items-center gap-16">
<div class="w-full md:w-1/2 z-10">
<span class="inline-block px-4 py-1.5 rounded-full bg-tertiary-fixed text-on-tertiary-fixed text-xs font-label font-bold tracking-widest uppercase mb-6">NEW HARVEST 2024</span>
<h1 class="font-headline text-5xl md:text-7xl font-extrabold leading-[1.1] text-on-surface mb-8 tracking-tight">
                        Nourish Your Body with Nature's <span class="text-primary italic">Sweetest</span> Bites
                    </h1>
<div class="flex flex-wrap gap-4">
<button class="bg-gradient-to-r from-primary to-primary-container text-on-primary px-10 py-5 rounded-full font-bold text-lg hover:scale-105 active:scale-95 transition-all editorial-shadow">
                            Shop Now
                        </button>
<button class="bg-surface-container-highest text-on-surface px-10 py-5 rounded-full font-bold text-lg hover:bg-surface-variant transition-all">
                            Learn More
                        </button>
</div>
</div>
<div class="w-full md:w-1/2 relative">
<div class="absolute -top-10 -right-10 w-64 h-64 bg-primary-fixed rounded-full blur-[100px] opacity-40"></div>
<div class="relative aspect-[4/5] rounded-xl overflow-hidden editorial-shadow transform md:rotate-2">
<img class="w-full h-full object-cover" data-alt="Premium glass jars filled with colorful dried mango and apricots sitting on a white stone surface next to fresh split figs and green leaves in bright morning light" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAKimCR7GHSLgxORTvjaj7l9GK1UiyGdwlrHf0P618HW7-61pbSuVNEMNCOpSXTvvDo1fGOcJBjlkFDIXBBe9KiB140a20eyEvO1ylzQhiXTMwmASyzzgxhkvBG2KsYqmy7aJLUrsdmM9s1HyBwNnDG_Ohh-wtX2pEMKzu7vaWjOP0pzDk14cu0Ly8Xek82YI0UdZJqAxnXD-oZSICQGrXot1Jj60nFnnIZ5L9XYlrfGaFkSkRGJfYx2EHUNApvAvVmpc663h1qblUh"/>
</div>
<div class="absolute -bottom-8 -left-8 p-6 bg-surface-container-lowest/80 backdrop-blur-md rounded-lg editorial-shadow max-w-[240px]">
<p class="font-headline font-bold text-primary mb-1">100% Organic</p>
<p class="text-sm text-on-surface-variant">Zero added sugars, straight from our solar-powered orchard.</p>
</div>
</div>
</div>
</section>

@endsection


@section('category')
<!-- Best Sellers / Categories -->
<section class="py-24 px-6 max-w-7xl mx-auto">
<h2 class="font-headline text-4xl font-bold text-center mb-16 tracking-tight">All Categories </h2>
<div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
    @foreach ( $categories as $category )
<a href="{{ route('categories.show', $category->id) }}" class="group cursor-pointer">


<div class="aspect-square rounded-xl overflow-hidden mb-6 bg-surface-container-low transition-transform duration-500 group-hover:-translate-y-2">
@php
$image = $category->images->first();
@endphp
@if($image)
    <img  class="w-full h-full object-cover" data-alt="Dried cranberries piled up with water droplets for fresh appearance on a white background" src="{{ asset('storage/categories/' . $image->path) }}" alt="صورة المنتج" >
    @else
        <span>لا توجد صورة</span>
    @endif
</div>
<h3 class="font-headline font-bold text-lg mb-1">{{ $category->name }}</h3>

</a>

@endforeach
</div>
</section>
@endsection
@section('new_products')
<section class="py-24 px-6 max-w-7xl mx-auto">
<h2 class="font-headline text-4xl font-bold text-center mb-16 tracking-tight">Voted Favorites</h2>
<div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
    @foreach ($newProducts as $product )
<!-- Product Card 1 -->
<div class="group">
<div class="relative aspect-[4/5] mb-6 rounded-lg bg-surface-container-lowest overflow-hidden transition-all duration-500 hover:shadow-2xl hover:shadow-primary/5">

    @php $image = $product->images->first(); @endphp
@if($image)
 <a href="{{ route('products.show', $product->id) }}">
    <img
        src="{{ asset('storage/products/' . $image->path) }}"
        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
        data-alt="Close-up of golden sun-dried organic mango slices with natural texture, soft studio lighting, organic earthy background" >
        </a>
@else
    <span>لا توجد صورة</span>
@endif
<div class="absolute top-4 left-4">
<span class="bg-primary text-on-primary text-[10px] font-bold uppercase tracking-wider px-3 py-1.5 rounded-full">Best Seller</span>
</div>
<button
    class="add-to-cart-btn absolute bottom-6 left-1/2 -translate-x-1/2 translate-y-12 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300 w-[80%] editorial-gradient text-on-primary py-3 rounded-full font-bold text-sm shadow-xl"
    data-id="{{ $product->id }}">
    Add to Cart
</button>
</div>
<div class="space-y-2 px-2">
<div class="flex justify-between items-start">
<h3 class="font-headline font-bold text-xl group-hover:text-primary transition-colors">{{ $product->name }}</h3>
<span class="text-primary font-bold text-lg">{{ $product->price }}</span>
</div>
<p class="text-on-surface-variant text-sm line-clamp-1">{{ $product->description }}</p>
<div class="flex items-center gap-1 text-tertiary text-xs font-bold pt-1">
    @php
    $rating = $product->reviews->avg('rating') ?? 0;
@endphp
    @for($i = 1; $i <= 5; $i++)
    <span class="material-symbols-outlined text-sm" data-icon="star" style="font-variation-settings: 'FILL' 1;" {{ $i <= $rating ? 'text-warning' : 'text-muted' }}></span>
@endfor
                            </div>
</div>
</div>
 @endforeach

</div>
</section>
@endsection
@section('reviews')
<!-- Customer Reviews -->
<section class="py-24 bg-surface-bright px-6 overflow-hidden">
<div class="max-w-7xl mx-auto">
    @foreach ($reviews as  $review)
<div class="flex flex-col items-center text-center mb-16">
<span class="text-xs font-bold tracking-[0.2em] text-primary mb-4 uppercase">Testimonials</span>
<h2 class="font-headline text-4xl font-bold tracking-tight">The Joy of Real Fruit</h2>
</div>
 @endforeach
</div>
</section>

@endsection

