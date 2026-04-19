@extends('front.app')
@section('hero')

<main class="pt-32 pb-20 px-6 max-w-7xl mx-auto">
<!-- Breadcrumbs -->
<div class="mb-12 flex items-center gap-2 text-xs font-label uppercase tracking-widest text-on-surface-variant">
<a href="#">Orchard</a>
<span class="material-symbols-outlined text-[10px]" data-icon="chevron_right">chevron_right</span>
<a href="#">Dried Fruits</a>
<span class="material-symbols-outlined text-[10px]" data-icon="chevron_right">chevron_right</span>
<span class="text-primary font-bold">Organic Mango</span>
</div>
<!-- Product Hero Section -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
<!-- Asymmetric Product Imagery -->
<div class="lg:col-span-7 grid grid-cols-6 gap-6">
<div class="col-span-6 rounded-xl overflow-hidden bg-surface-container-lowest aspect-[4/5] relative">
    @php $image = $product->images->first(); @endphp
@if($image)
    <img
       id="mainProductImage"
        src="{{ asset('storage/products/' . $image->path) }}"
        class="w-full h-full object-cover" data-alt="Close-up of premium organic sun-dried mango slices with vibrant orange texture on a clean white minimalist background with soft shadows"
>
@else
    <span>لا توجد صورة</span>
@endif
<div class="absolute top-8 left-8 bg-tertiary-container/90 backdrop-blur-md px-4 py-1 rounded-full text-[10px] font-bold uppercase tracking-tighter text-on-tertiary-container">
                        Limited Harvest
                    </div>
</div>
<div class="col-span-3 rounded-lg overflow-hidden bg-surface-container-lowest aspect-square">
<img alt="Detail view" class="w-full h-full object-cover" data-alt="Macro photography of a single dried mango slice showing its rich fibrous texture and glistening natural sugars under warm morning light" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAm2byvkwYcumsFL3aVvORDeA_zj7QA4k39wfwo-k_YkH3zYvK-tkimuHyc9TW1FyLLm9ugqwrd1slu5LSZgO5jZXHwfFoOmmK9n251NjVG-tq1mGhZwEgsNamJOLwVPv-I38hC72UxEPGVx0iti6-hnJWqtyAE2jHd1ustTB7VfF3CDWlQ3qceSWnNy89dRDVCjXSV9OQlgFifUZRQbE79ROjz05zlmBH9VKHlcfp9tf-UHkKzhLmN4Jqvb0XjuG0gZWPwZGNy-uCI"/>
</div>
<div class="col-span-3 rounded-lg overflow-hidden bg-surface-container-lowest aspect-square">
<img alt="Lifestyle view" class="w-full h-full object-cover" data-alt="Artisanal glass jar filled with dried mango slices sitting on a rustic wooden table next to fresh green leaves in a bright sunlit kitchen" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDI92uJ3PdEqBIZkzEfglwjywVRRtmqhauQrD1PCFmHqU5jKxwQjVcJ7kjZt79OeJyjLHwpswVQRp4lpzP5nojc_4iVsLJHHqVHnSN3oBbExDIzC1t4uKi-FBYnk2iME_o0l1owPwsXgpdL2167gZCsDqGZajK60H-mvFFiGJ6hSBfGD_FdJhQQyJM48L8zeCyt2Ah-x7ocKVKe3OhRzIRwnNiaPknyXlq9ECcuOvQnzJHigfpBDjeB2efRcBIXyh-ddeZfxe9SYPX4"/>
</div>
</div>
<!-- Product Info -->
<div class="lg:col-span-5 sticky top-32">
<div class="mb-4 flex items-center gap-2">
<span class="bg-primary-fixed text-on-primary-fixed text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest">Best Seller</span>
<div class="flex items-center text-tertiary">
   ⭐ {{ number_format($product->reviews->avg('rating'), 1) }}
        ({{ $product->reviews->count() }} reviews)</div>
</div>
<h1 class="text-5xl font-extrabold text-on-surface tracking-tight mb-4">{{ $product->name }}</h1>
<div id="productPrice" class="text-2xl font-bold mb-4">
    {{ $product->price }} جنيه
</div>


<p class="text-xl text-on-surface-variant font-body mb-8 leading-relaxed">
                {{ $product->description  }}
                </p>

<!-- Size Selection -->
<div class="mb-10">
<label class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant block mb-4">
    Select Size
</label>
<p id="stockBox" class="text-sm text-gray-500 mb-3">
    @if($product->variations->count())

    @else
        Stock: {{ $product->stock }}
    @endif
</p>

<div class="flex gap-4">
@foreach($product->variations as $variation)
<button

    type="button"
    class="variation-btn flex-1 py-4 px-2 rounded-lg bg-surface-container-low text-on-surface transition-all"
    data-id="{{ $variation->id }}"
    data-stock="{{ $variation->stock }}"
    data-price="{{ $variation->price_override ?? $product->price }}"
    data-image="{{ $variation->image ? asset('storage/products/' . $variation->image->path) : asset('storage/products/' . $product->images->first()->path) }}"
>
    <div class="text-xs font-bold">{{ $variation->weight }} جرام </div>
    <div class="text-sm font-semibold opacity-60">
        {{ $variation->price_override ?? $product->price }} جنيه
    </div>
</button>
@endforeach
</div>
</div>
{{-- عرض حالة المخزون --}}
@if($product->variations->count())
    {{-- لازم يختار variation --}}
    <button  disabled id="addBtn">اختار المقاس الأول</button>
@else
        <button disabled>Out of Stock</button>

@endif
<!-- Main CTA -->
<div class="space-y-4 mb-12">
    <input type="hidden" id="selectedVariation">

<button
type="button"
 data-id="{{ $product->id }}"
  id="addToCartBtn"
 class="add-to-cart-btn w-full py-5 bg-gradient-to-r from-primary to-primary-container text-on-primary rounded-full font-bold text-lg shadow-[0_20px_40px_rgba(71,102,75,0.2)] hover:scale-[1.02] active:scale-95 transition-all">
                        Add to Cart
                    </button>
<div class="flex items-center justify-center gap-6 text-xs text-on-surface-variant font-medium">
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-base" data-icon="eco">eco</span> 100% Organic</span>
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-base" data-icon="local_shipping">local_shipping</span> Carbon Neutral Shipping</span>
</div>
</div>
<!-- Product Features Bento -->
<div class="grid grid-cols-2 gap-4">
<div class="p-6 rounded-lg bg-surface-container-low">
<span class="material-symbols-outlined text-primary mb-2" data-icon="nutrition">nutrition</span>
<h4 class="text-sm font-bold mb-1">Nutrient Dense</h4>
<p class="text-xs text-on-surface-variant leading-relaxed">High in Vitamin A and dietary fiber for gut health.</p>
</div>
<div class="p-6 rounded-lg bg-tertiary-container/10">
<span class="material-symbols-outlined text-tertiary mb-2" data-icon="forest">forest</span>
<h4 class="text-sm font-bold mb-1">Ethical Sourcing</h4>
<p class="text-xs text-on-surface-variant leading-relaxed">Fair trade certified directly from our farming partners.</p>
</div>
</div>
</div>
</div>
<!-- Detailed Content Section -->
<div class="mt-24 grid grid-cols-1 lg:grid-cols-12 gap-16 pt-24 border-t-0">
<div class="lg:col-span-7">
<section class="mb-16">
<h2 class="text-3xl font-bold mb-6">The Oravida Difference</h2>
<div class="prose prose-stone max-w-none text-on-surface-variant font-body leading-relaxed space-y-4">
<p>Our Organic Dried Mango is more than just a snack. It’s a concentrated burst of sun-drenched tropical energy. Unlike commercial dried fruits that are often treated with sulfur dioxide to maintain color, our mangoes are naturally dried until they reach a deep, rich amber hue.</p>
<p>We use the 'Kensington Pride' variety, renowned for its fiberless texture and sweet, tangy profile. Each slice is hand-carved and monitored during the drying process to ensure it remains chewy, not tough.</p>
</div>
</section>
<section>
<h3 class="text-xl font-bold mb-6">Ingredients &amp; Nutrition</h3>
<div class="bg-surface-container-lowest p-8 rounded-xl space-y-6">
<div>
<span class="text-[10px] font-bold uppercase tracking-widest text-primary block mb-2">Ingredients</span>
<p class="text-sm font-medium">100% Certified Organic Mango slices. That's it.</p>
</div>
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 pt-6 border-t border-outline-variant/20">
<div>
<div class="text-2xl font-bold text-on-surface">110</div>
<div class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Calories</div>
</div>
<div>
<div class="text-2xl font-bold text-on-surface">2g</div>
<div class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Fiber</div>
</div>
<div>
<div class="text-2xl font-bold text-on-surface">0g</div>
<div class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Fat</div>
</div>
<div>
<div class="text-2xl font-bold text-on-surface">22g</div>
<div class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Natural Sugar</div>
</div>
</div>
</div>
</section>
</div>
<!-- Side Callout / Testimonial -->
<div class="lg:col-span-5">
<div class="bg-primary text-on-primary p-12 rounded-xl relative overflow-hidden">
<span class="material-symbols-outlined text-6xl absolute -bottom-4 -right-4 opacity-10" data-icon="format_quote">format_quote</span>
<p class="text-xl font-medium leading-relaxed mb-8 italic">
                        "I've tried every brand of dried mango on the market, but Oravida is the only one that tastes like a real, ripe mango picked straight from the tree."
                    </p>
<div class="flex items-center gap-4">
<div class="w-12 h-12 rounded-full bg-primary-container overflow-hidden">
<img alt="Customer" class="w-full h-full object-cover" data-alt="Portrait of a smiling young woman with natural skin and soft lighting in a warm domestic setting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDTQuT34k4oWDi6_dv_25wx4CCpWLF9ZihUrDKYNrtadcPQWjZ0PyM24lDZ86yijA7lEl7aDjorMy3_CkfxyIkOOw3375sx1CRCb7_48zPp_Mfe6WGpRDs74d934xD_j4YjC0kX06npRYgWqpTuNb5fOC131P6oz5Mi7-fT_3boIPmlRit8MibGOKnZxi6UZg9xvl3ZCFNDFOXcwkk5tL0_-D_5SGeYwccIQq__vfWERXemvHqdzS8uo2jFMHAAmXH1_33P_sDgQX5q"/>
</div>
<div>
<div class="text-sm font-bold">Sarah Jenkins</div>
<div class="text-xs opacity-70">Verified Enthusiast</div>
</div>
</div>
</div>
</div>
</div>
</main>
<script>
let buttons = document.querySelectorAll('.variation-btn');
let priceBox = document.getElementById('productPrice');
let imageBox = document.getElementById('mainProductImage');
let selectedVariation = document.getElementById('selectedVariation');
let stockBox = document.getElementById('stockBox');
let addBtn = document.getElementById('addToCartBtn');

buttons.forEach(btn => {
    btn.addEventListener('click', function () {
        // enable button when variation selected
addBtn.disabled = false;
addBtn.innerText = "Add to Cart";
addBtn.classList.remove('bg-gray-400');
addBtn.classList.add('bg-gradient-to-r', 'from-primary', 'to-primary-container');
if (this.dataset.stock <= 0) {

    addBtn.disabled = true;
    addBtn.innerText = "Out of Stock";

    addBtn.classList.remove('from-primary', 'to-primary-container');
    addBtn.classList.add('bg-red-500');

    return;
}

        // reset الشكل
        buttons.forEach(b => {
            b.classList.remove('border-2', 'border-primary', 'bg-primary-fixed/20');
        });

        // الشكل النشط
        this.classList.add('border-2', 'border-primary', 'bg-primary-fixed/20');

        // السعر
        priceBox.innerText = this.dataset.price + " جنيه";

        // الصورة
        if (this.dataset.image) {
            imageBox.src = this.dataset.image;
        }

        // variation id
        selectedVariation.value = this.dataset.id;

        // 🔥 stock display
        if (stockBox) {
            stockBox.innerText = "Stock: " + this.dataset.stock;
        }
    });
});
</script>
@endsection
