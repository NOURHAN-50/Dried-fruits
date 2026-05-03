@extends('front.app')
@section('content')
    <main>
        <!-- Header Banners -->
        @if(isset($banners))
            @foreach($banners->where('location', 'header') as $banner)
                <div class="w-full bg-surface-container-highest">
                    <a href="{{ $banner->link ?? '#' }}" class="block w-full">
                        @if($banner->images->first())
                            <img src="{{ asset('storage/banners/' . $banner->images->first()->path) }}" alt="{{ $banner->title }}" class="w-full object-cover max-h-32">
                        @endif
                    </a>
                </div>
            @endforeach
        @endif

        <!-- Hero Section (Sliders) -->
        @if(isset($sliders) && $sliders->count() > 0)
<section class="pt-0 pb-12 px-6 max-w-7xl mx-auto overflow-hidden relative" id="hero-carousel">                    <div class="carousel-inner relative w-full overflow-hidden" style="min-height: 600px;">
                    @foreach($sliders as $index => $slider)
                    <div class="carousel-slide absolute inset-0 transition-opacity duration-1000 ease-in-out {{ $index == 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }}" data-index="{{ $index }}">
                        <div class="relative flex flex-col md:flex-row items-center gap-16 h-full">
                            <div class="w-full md:w-1/2 z-10">
                                @if($slider->subtitle)
                                <span class="inline-block px-4 py-1.5 rounded-full bg-tertiary-fixed text-on-tertiary-fixed text-xs font-label font-bold tracking-widest uppercase mb-6">
                                    {{ $slider->subtitle }}
                                </span>
                                @endif
                                <h1 class="font-headline text-5xl md:text-7xl font-extrabold leading-[1.1] text-on-surface mb-8 tracking-tight">
                                    {{ $slider->title ?? 'Nourish Your Body with Nature\'s Sweetest Bites' }}
                                </h1>
                                <div class="flex flex-wrap gap-4">
                                    @if($slider->link)
                                    <a href="{{ $slider->link }}" class="bg-gradient-to-r from-primary to-primary-container text-on-primary px-10 py-5 rounded-full font-bold text-lg hover:scale-105 active:scale-95 transition-all editorial-shadow inline-block text-center">
                                        Shop Now
                                    </a>
                                    @endif
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 relative h-full flex items-center">
                                <div class="absolute -top-10 -right-10 w-64 h-64 bg-primary-fixed rounded-full blur-[100px] opacity-40"></div>
                                <div class="relative aspect-[4/5] w-full rounded-xl overflow-hidden editorial-shadow transform md:rotate-2">
                                    @if($slider->images->first())
                                    <img class="w-full h-full object-cover" src="{{ asset('storage/' . $slider->images->first()->path) }}" alt="{{ $slider->title }}" />
                                    @else
                                    <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAKimCR7GHSLgxORTvjaj7l9GK1UiyGdwlrHf0P618HW7-61pbSuVNEMNCOpSXTvvDo1fGOcJBjlkFDIXBBe9KiB140a20eyEvO1ylzQhiXTMwmASyzzgxhkvBG2KsYqmy7aJLUrsdmM9s1HyBwNnDG_Ohh-wtX2pEMKzu7vaWjOP0pzDk14cu0Ly8Xek82YI0UdZJqAxnXD-oZSICQGrXot1Jj60nFnnIZ5L9XYlrfGaFkSkRGJfYx2EHUNApvAvVmpc663h1qblUh" />
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                @if($sliders->count() > 1)
                <!-- Carousel Controls -->
                <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 flex space-x-3 z-20">
                    @foreach($sliders as $index => $slider)
                    <button type="button" class="carousel-indicator w-3 h-3 rounded-full {{ $index == 0 ? 'bg-primary' : 'bg-surface-variant' }}" data-target="{{ $index }}" aria-label="Slide {{ $index + 1 }}"></button>
                    @endforeach
                </div>
                @endif
            </section>

            @if($sliders->count() > 1)
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    let currentSlide = 0;
                    const slides = document.querySelectorAll('.carousel-slide');
                    const indicators = document.querySelectorAll('.carousel-indicator');
                    const totalSlides = slides.length;

                    function showSlide(index) {
                        // Hide all slides
                        slides.forEach(slide => {
                            slide.classList.remove('opacity-100', 'z-10');
                            slide.classList.add('opacity-0', 'z-0');
                        });
                        indicators.forEach(indicator => {
                            indicator.classList.remove('bg-primary');
                            indicator.classList.add('bg-surface-variant');
                        });

                        // Show current slide
                        slides[index].classList.remove('opacity-0', 'z-0');
                        slides[index].classList.add('opacity-100', 'z-10');
                        indicators[index].classList.remove('bg-surface-variant');
                        indicators[index].classList.add('bg-primary');
                    }

                    function nextSlide() {
                        currentSlide = (currentSlide + 1) % totalSlides;
                        showSlide(currentSlide);
                    }

                    // Auto spin
                    let slideInterval = setInterval(nextSlide, 5000);

                    // Click indicators
                    indicators.forEach((indicator, index) => {
                        indicator.addEventListener('click', () => {
                            clearInterval(slideInterval);
                            currentSlide = index;
                            showSlide(currentSlide);
                            slideInterval = setInterval(nextSlide, 5000);
                        });
                    });
                });
            </script>
            @endif

        @else
            <!-- Static Fallback Hero Section -->
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
                            <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAKimCR7GHSLgxORTvjaj7l9GK1UiyGdwlrHf0P618HW7-61pbSuVNEMNCOpSXTvvDo1fGOcJBjlkFDIXBBe9KiB140a20eyEvO1ylzQhiXTMwmASyzzgxhkvBG2KsYqmy7aJLUrsdmM9s1HyBwNnDG_Ohh-wtX2pEMKzu7vaWjOP0pzDk14cu0Ly8Xek82YI0UdZJqAxnXD-oZSICQGrXot1Jj60nFnnIZ5L9XYlrfGaFkSkRGJfYx2EHUNApvAvVmpc663h1qblUh" />
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- Featured Products (Bento Style) -->
        <section class="py-24 bg-surface-container-low px-6">
            <div class="max-w-7xl mx-auto">
                <div class="flex justify-between items-end mb-16">
                    <div>
                        <h2 class="font-headline text-4xl font-bold tracking-tight mb-4">New product</h2>
                        <p class="text-on-surface-variant max-w-md">Our curated selection of seasonal favorites, picked
                            at peak ripeness and naturally dried.</p>
                    </div>
                    <a class="text-primary font-bold flex items-center gap-2 group" href="{{ route('shop') }}">
                        Explore All <span
                            class="material-symbols-outlined transition-transform group-hover:translate-x-1"
                            data-icon="arrow_forward">arrow_forward</span>
                    </a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach ($newProducts as $product)
                    <div class="bg-surface-container-lowest rounded-xl p-6 editorial-shadow group flex flex-col justify-between">
                        <a href="{{ route('front.products.show', $product->id) }}">
                            <div class="aspect-square rounded-lg overflow-hidden mb-6 relative">
                                @if(!$product->isInStock())
                                    <div class="absolute top-4 left-4 bg-red-500 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest z-10">
                                        Out of Stock
                                    </div>
                                @endif
                                @if($product->images->count() > 0)
                                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{asset('storage/' . $product->images->first()?->path) }}" alt="{{ $product->name }}" />
                                @else
                                <div class="w-full h-full bg-surface-variant flex items-center justify-center">
                                    <span class="text-on-surface-variant text-sm">No Image</span>
                                </div>
                                @endif
                            </div>
                            <h4 class="font-headline font-bold text-xl mb-2">{{ $product->name }}</h4>
                            <p class="text-on-surface-variant text-sm mb-4">{{ Str::limit($product->description, 60) }}</p>
                            <div class="flex justify-between items-center mt-auto">
                                <span class="font-bold text-primary text-lg">{{ $product->price }} جنيه</span>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="py-24 px-6 max-w-7xl mx-auto">
    <h2 class="font-headline text-4xl font-bold mb-12">Latest Products</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach($latestProducts as $product)
        <div class="bg-surface-container-lowest rounded-xl p-6 editorial-shadow group">
            <a href="{{ route('front.products.show', $product->id) }}">

                <div class="aspect-square overflow-hidden rounded-lg mb-4">
                    <img src="{{ asset('storage/' . $product->images->first()?->path) }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition">
                </div>

                <h3 class="font-bold text-lg">{{ $product->name }}</h3>
                <p class="text-primary font-bold mt-2">{{ $product->price }} جنيه</p>

            </a>
        </div>
        @endforeach
    </div>
</section>
<section class="py-24 px-6 max-w-7xl mx-auto bg-surface-container-low">
    <h2 class="font-headline text-4xl font-bold mb-12 text-center">Best Selling Products</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach($bestSellingProducts as $product)
        <div class="bg-white rounded-xl p-6 editorial-shadow group border border-surface-variant">

            <a href="{{ route('front.products.show', $product->id) }}">

                <div class="aspect-square overflow-hidden rounded-lg mb-4 relative">
                    <img src="{{ asset('storage/' . $product->images->first()?->path) }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition">

                    <span class="absolute top-3 left-3 bg-primary text-white text-xs px-3 py-1 rounded-full">
                        Best Seller
                    </span>
                </div>

                <h3 class="font-bold text-lg">{{ $product->name }}</h3>
                <p class="text-primary font-bold mt-2">{{ $product->price }} جنيه</p>

            </a>
        </div>
        @endforeach
    </div>
</section>
        <!-- Middle Banners -->
        @if(isset($banners))
            @foreach($banners->where('location', 'middle') as $banner)
                <div class="w-full bg-surface-container-low py-8">
                    <div class="max-w-7xl mx-auto px-6">
                        <a href="{{ $banner->link ?? '#' }}" class="block w-full rounded-xl overflow-hidden shadow-lg">
                            @if($banner->images->first())
                                <img src="{{ asset('storage/' . $banner->images->first()->path) }}" alt="{{ $banner->title }}" class="w-full object-cover max-h-48">
                            @endif
                        </a>
                    </div>
                </div>
            @endforeach
        @endif

        <!-- Best Sellers / Categories -->
        <section class="py-24 px-6 max-w-7xl mx-auto">
            <h2 class="font-headline text-4xl font-bold text-center mb-16 tracking-tight">Voted Favorites</h2>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($categories as $category)
                <a href="{{ route('categories.show', $category->id) }}" class="group cursor-pointer">
                    <div
                        class="aspect-square rounded-xl overflow-hidden mb-6 bg-surface-container-low transition-transform duration-500 group-hover:-translate-y-2 relative">
                        @if($category->images && $category->images->count() > 0)
                        <img class="w-full h-full object-cover" src="{{ asset('storage/'.$category->images->first()->path) }}" alt="{{ $category->name }}" />
                        @else
                        <div class="w-full h-full bg-surface-variant flex items-center justify-center">
                            <span class="text-on-surface-variant text-sm">No Image</span>
                        </div>
                        @endif
                        <div class="absolute inset-0 bg-black/10 group-hover:bg-black/0 transition-colors duration-500"></div>
                    </div>
                    <h3 class="font-headline font-bold text-xl mb-1 text-center group-hover:text-primary transition-colors">{{ $category->name }}</h3>
                </a>
                @endforeach
            </div>
        </section>
        <!-- Footer Banners -->
        @if(isset($banners))
            @foreach($banners->where('location', 'footer') as $banner)
                <div class="w-full bg-surface-bright py-8">
                    <div class="max-w-7xl mx-auto px-6">
                        <a href="{{ $banner->link ?? '#' }}" class="block w-full rounded-xl overflow-hidden shadow-lg">
                            @if($banner->images->first())
                                <img src="{{ asset('storage/' . $banner->images->first()->path) }}" alt="{{ $banner->title }}" class="w-full object-cover max-h-48">
                            @endif
                        </a>
                    </div>
                </div>
            @endforeach
        @endif

        <!-- Customer Reviews -->
<section class="py-24 bg-surface-bright px-6 overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col items-center text-center mb-16">
            <span class="text-xs font-bold tracking-[0.2em] text-primary mb-4 uppercase">Testimonials</span>
            <h2 class="font-headline text-4xl font-bold tracking-tight">Customer Reviews</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($reviews->take(3) as $review)
                <div class="bg-surface-container-lowest p-8 rounded-xl editorial-shadow relative">

                    <div class="absolute -top-4 -left-4 w-12 h-12 bg-primary-fixed rounded-full flex items-center justify-center text-on-primary-fixed">
                        <span class="material-symbols-outlined">format_quote</span>
                    </div>

                    <p class="italic text-on-surface mb-6 leading-relaxed">
                        "{{ $review->comment }}"
                    </p>

                    <div class="flex items-center gap-4">
                        <div>
                            <h4 class="font-bold text-sm">
                                {{ $review->customer->name ?? 'User' }}
                            </h4>
                            <p class="text-xs text-on-surface-variant">
                                ⭐ {{ $review->rating }}/5
                            </p>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</section>

    </main>
@endsection



