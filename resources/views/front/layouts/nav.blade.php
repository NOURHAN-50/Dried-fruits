<body class="bg-background font-body text-on-surface">
<!-- Top Navigation Bar -->
<nav class="fixed top-4 left-1/2 -translate-x-1/2 w-[92%] rounded-full z-50 bg-white/80 dark:bg-stone-900/80 backdrop-blur-xl shadow-[0_20px_40px_rgba(0,0,0,0.04)] flex justify-between items-center px-8 py-3 max-w-7xl mx-auto">
<div class="text-2xl font-bold tracking-tight text-green-900 dark:text-green-50 font-headline">Oravida</div>
<div class="hidden md:flex items-center gap-8 font-['Plus_Jakarta_Sans'] font-medium text-sm tracking-wide">
<a class="text-green-900 dark:text-white font-bold border-b-2 border-green-800 dark:border-green-200 pb-1 hover:scale-105 transition-transform duration-300" href="{{ route('shop') }}">Shop</a>
<a class="text-stone-600 dark:text-stone-400 hover:text-green-800 dark:hover:text-green-200 transition-colors hover:scale-105 transition-transform duration-300" href="#">Stories</a>
<a class="text-stone-600 dark:text-stone-400 hover:text-green-800 dark:hover:text-green-200 transition-colors hover:scale-105 transition-transform duration-300" href="#">Wholesale</a>
<a class="text-stone-600 dark:text-stone-400 hover:text-green-800 dark:hover:text-green-200 transition-colors hover:scale-105 transition-transform duration-300" href="#">Sustainability</a>
</div>
<div class="flex items-center gap-4 text-green-800 dark:text-green-200">
<button class="hover:scale-105 transition-transform duration-300 active:scale-95 duration-200">
<span class="material-symbols-outlined" data-icon="person">person</span>
</button>
<a href="{{ route('front.cart.index') }}" class="relative">
    <span class="material-symbols-outlined">
        shopping_cart
    </span>

<span id="cart-count"
    class="absolute -top-1 -right-1 bg-tertiary text-white text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-bold">
    {{ $cartCount }}
</span>
</a>
</div>
</nav>
<main class="pt-32 px-6 max-w-7xl mx-auto">

