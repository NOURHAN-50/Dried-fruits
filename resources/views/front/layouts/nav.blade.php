
<body class="bg-background font-body text-on-surface">
<!-- Top Navigation Bar -->
<nav class="fixed top-4 left-1/2 -translate-x-1/2 w-[92%] rounded-full z-50 bg-white/80 dark:bg-stone-900/80 backdrop-blur-xl shadow-[0_20px_40px_rgba(0,0,0,0.04)] flex justify-between items-center px-8 py-3 max-w-7xl mx-auto">
<div class="text-2xl font-bold tracking-tight text-green-900 dark:text-green-50 font-headline">Oravida</div>
<div class="hidden md:flex items-center gap-8 font-['Plus_Jakarta_Sans'] font-medium text-sm tracking-wide">
    <a class="text-green-900 dark:text-white font-bold border-b-2 border-green-800 dark:border-green-200 pb-1 hover:scale-105 transition-transform duration-300" href="{{ route('front.home.index') }}">Home</a>
<a class="text-stone-600 dark:text-stone-400 hover:text-green-800 dark:hover:text-green-200 transition-colors hover:scale-105 transition-transform duration-300" href="{{ route('shop') }}">Shop</a>
<a class="text-stone-600 dark:text-stone-400 hover:text-green-800 dark:hover:text-green-200 transition-colors hover:scale-105 transition-transform duration-300" href="{{ route('offers') }}">Offers</a>

<a class="text-stone-600 dark:text-stone-400 hover:text-green-800 dark:hover:text-green-200 transition-colors hover:scale-105 transition-transform duration-300" href="{{ route('contact.index') }}">ContactUs</a>

@auth
<a class="text-stone-600 dark:text-stone-400 hover:text-green-800 dark:hover:text-green-200 transition-colors hover:scale-105 transition-transform duration-300" href="{{ route('orders.index') }}"> My Orders</a>
@endauth

</div>
<div class="flex items-center gap-4 text-green-800 dark:text-green-200">
    @guest
<button id="openLoginModal" class="hover:scale-105 transition-transform duration-300 active:scale-95">
    <span class="material-symbols-outlined">person</span>
</button>
@endguest
 @auth
    <span>Hi, {{ auth()->user()->name }}</span>

    <a href="/profile">Profile</a>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endauth

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

<div id="loginModal" class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">
    <div class="bg-white p-6 rounded-2xl w-[350px] shadow-lg relative">


        <button id="closeLoginModal" class="absolute top-3 right-3 text-gray-500">
            ✕
        </button>

        <h2 class="text-xl font-bold mb-4 text-center">Login</h2>

<form method="POST" action="{{ route('login') }}">
    @csrf
            <input type="email" name="email" placeholder="Email"
                class="w-full mb-3 p-2 border rounded-lg" />
                @error('email', 'login')
<small class="text-red-500">{{ $message }}</small>
@enderror

            <input type="password" name="password" placeholder="Password"
                class="w-full mb-4 p-2 border rounded-lg" />
                @error('password', 'login')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
            <button class="w-full bg-green-700 text-white py-2 rounded-lg">
                Login
            </button>
        </form>
        <p class="text-sm text-center mt-3">
    Don't have an account?
    <a href="{{ route('register.form') }}" class="text-green-700 cursor-pointer">Register</a>
</p>


    </div>
</div>

<
<main class="pt-32 px-6 max-w-7xl mx-auto">


@if ($errors->login->any())
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById('loginModal').classList.remove('hidden');
        document.getElementById('loginModal').classList.add('flex');
    });
</script>
@endif

