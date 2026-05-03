<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "on-secondary": "#ffffff",
                    "error-container": "#ffdad6",
                    "inverse-on-surface": "#f0f1f1",
                    "secondary-container": "#d4e5ca",
                    "on-surface": "#1a1c1c",
                    "secondary": "#53634d",
                    "surface-container-high": "#e8e8e8",
                    "primary-fixed-dim": "#adcfaf",
                    "on-primary-fixed-variant": "#304d35",
                    "on-error": "#ffffff",
                    "tertiary": "#78555e",
                    "surface-container-low": "#f3f3f3",
                    "on-primary": "#ffffff",
                    "on-tertiary-fixed-variant": "#5e3e47",
                    "on-secondary-fixed": "#121f0e",
                    "on-surface-variant": "#424842",
                    "surface-tint": "#47664b",
                    "surface-container-lowest": "#ffffff",
                    "on-error-container": "#93000a",
                    "tertiary-container": "#bd949e",
                    "on-primary-container": "#1f3c25",
                    "on-background": "#1a1c1c",
                    "error": "#ba1a1a",
                    "outline": "#737971",
                    "secondary-fixed-dim": "#bbccb1",
                    "surface-container-highest": "#e2e2e2",
                    "primary-fixed": "#c8ebca",
                    "tertiary-fixed-dim": "#e7bbc6",
                    "surface-bright": "#f9f9f9",
                    "on-tertiary-container": "#4b2d36",
                    "primary-container": "#86a789",
                    "surface": "#f9f9f9",
                    "inverse-primary": "#adcfaf",
                    "surface-container": "#eeeeee",
                    "tertiary-fixed": "#ffd9e2",
                    "on-tertiary-fixed": "#2d141c",
                    "secondary-fixed": "#d7e8cd",
                    "background": "#f9f9f9",
                    "inverse-surface": "#2f3131",
                    "on-secondary-container": "#586751",
                    "surface-dim": "#dadada",
                    "on-tertiary": "#ffffff",
                    "surface-variant": "#e2e2e2",
                    "on-secondary-fixed-variant": "#3c4b37",
                    "primary": "#47664b",
                    "outline-variant": "#c2c8bf",
                    "on-primary-fixed": "#03210c"
            },
            "borderRadius": {
                    "DEFAULT": "1rem",
                    "lg": "2rem",
                    "xl": "3rem",
                    "full": "9999px"
            },
            "fontFamily": {
                    "headline": ["Plus Jakarta Sans"],
                    "body": ["Manrope"],
                    "label": ["Manrope"]
            }
          },
        },
      }
    </script>
<footer class="w-full mt-20 pt-16 pb-8 bg-stone-100 dark:bg-stone-950 font-['Manrope'] text-sm leading-relaxed text-green-900 dark:text-green-100">    <div class="max-w-7xl mx-auto px-8 grid grid-cols-1 md:grid-cols-4 gap-12">
  <div class="col-span-1 md:col-span-1">



<span class="text-xl font-bold text-green-900 dark:text-green-50 mb-4 block">Oravida</span>
<p class="text-stone-500 dark:text-stone-400 max-w-xs">
                    Rooted in the wisdom of organic farming, bringing the pure essence of the orchard to your daily ritual.
                </p>
</div>
<div>
<h5 class="font-bold mb-6 uppercase tracking-widest text-[10px]">Quick Links</h5>
<ul class="space-y-4">
<li><a class="text-stone-500 dark:text-stone-400 hover:text-green-700 dark:hover:text-green-300 transition-colors" href="{{ route('front.home.index')}}">Home</a></li>
<li><a class="font-semibold text-green-800 dark:text-green-200" href="{{ route('shop') }}">Shop All</a></li>
<li><a class="text-stone-500 dark:text-stone-400 hover:text-green-700 dark:hover:text-green-300 transition-colors" href="{{ route('contact.index') }}">Contact us</a></li>
<li><a class="text-stone-500 dark:text-stone-400 hover:text-green-700 dark:hover:text-green-300 transition-colors" href="#">Who are we</a></li>
</ul>
</div>
<div>
<h5 class="font-bold mb-6 uppercase tracking-widest text-[10px]">Categories</h5>
<ul class="space-y-4">
<li><a class="text-stone-500 dark:text-stone-400 hover:text-green-700 dark:hover:text-green-300 transition-colors" href="#">Shipping Policy</a></li>
<li><a class="text-stone-500 dark:text-stone-400 hover:text-green-700 dark:hover:text-green-300 transition-colors" href="#">Terms of Service</a></li>
<li><a class="text-stone-500 dark:text-stone-400 hover:text-green-700 dark:hover:text-green-300 transition-colors" href="#">Privacy</a></li>
<li><a class="text-stone-500 dark:text-stone-400 hover:text-green-700 dark:hover:text-green-300 transition-colors" href="#">Contact Us</a></li>
</ul>
</div>
<div>
<h5 class="font-bold mb-6 uppercase tracking-widest text-[10px]">Connect</h5>
<ul class="space-y-4">
<li><a class="text-stone-500 dark:text-stone-400 hover:text-green-700 dark:hover:text-green-300 transition-colors" href="">Instagram</a></li>
<li><a class="text-stone-500 dark:text-stone-400 hover:text-green-700 dark:hover:text-green-300 transition-colors" href="https://wa.me/201143180001">01143180001</a></li>
<li><a class="text-stone-500 dark:text-stone-400 hover:text-green-700 dark:hover:text-green-300 transition-colors" href="#">LinkedIn</a></li>
</ul>
</div>
</div>
<div class="max-w-7xl mx-auto px-8 pt-12 mt-12 border-t border-stone-200 dark:border-stone-800 flex flex-col md:flex-row justify-between items-center gap-4">
<p class="text-stone-400 text-xs">© 2024 Oravida Organic Orchard. All rights reserved.</p>
<div class="flex gap-6">
<span class="material-symbols-outlined text-stone-400 text-xl" data-icon="payment">payment</span>
<span class="material-symbols-outlined text-stone-400 text-xl" data-icon="security">security</span>
</div>
</div>
</footer>
<script>
    document.addEventListener('DOMContentLoaded', function () {

document.querySelectorAll('.add-to-cart-btn').forEach(button => {
    button.addEventListener('click', function (e) {
        e.preventDefault();

        let productId = this.dataset.id;
        let variationId = document.getElementById('selectedVariation')?.value;

        if (!variationId && document.querySelectorAll('.variation-btn').length > 0) {
            alert("اختار المقاس الأول");
            return;
        }
        fetch(`/cart/add/${productId}`, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                "Accept": "application/json",
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                variation_id: variationId || null
            })
        })
        .then(res => res.json())
        .then(data => {
            if (!data.status) {
                alert(data.message);
                return;
            }
            let cartCount = document.getElementById('cart-count');
            if (cartCount) {
                cartCount.innerText = data.cart_count;
            }
            alert("Added to cart ✅");
        })
        .catch(err => console.log(err));
    });
});

});

</script>



<script>
document.querySelectorAll('.increase-btn, .decrease-btn').forEach(btn => {
    btn.addEventListener('click', function () {

        let id = this.dataset.id;
        let qtyEl = document.getElementById('qty-' + id);
        let priceEl = document.getElementById('price-' + id);

        let quantity = parseInt(qtyEl.innerText);
        let unitPrice = parseFloat(priceEl.dataset.unit);

        if (this.classList.contains('increase-btn')) {
            quantity++;
        } else {
            quantity--;
            if (quantity < 1) return;
        }

        // Optimistically update DOM to handle rapid clicks properly
        qtyEl.innerText = quantity;
        priceEl.innerText = unitPrice * quantity;

        fetch('/cart/update', {
            method: 'POST',
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify({
                id: id,
                quantity: quantity
            })
        })
        .then(res => res.json())
        .then(data => {

            // 3- update subtotal + total
            document.getElementById('subtotal').innerText = data.subtotal;
            document.getElementById('total').innerText = data.total;

            // 4- update cart badge count
            let cartCountEl = document.getElementById('cart-count');
            if (cartCountEl && data.cart_count !== undefined) {
                cartCountEl.innerText = data.cart_count;
            }
        })
        .catch(err => console.log(err));
    });
});
</script>

<script>
    const loginModal = document.getElementById("loginModal");
    const registerModal = document.getElementById("registerModal");

    const goToRegister = document.getElementById("goToRegister");
    const goToLogin = document.getElementById("goToLogin");

    const openLogin = document.getElementById("openLoginModal");
    const closeLogin = document.getElementById("closeLoginModal");
    const closeRegister = document.getElementById("closeRegisterModal");

    // open login
    openLogin.onclick = () => {
        loginModal.classList.remove("hidden");
        loginModal.classList.add("flex");
    };

    // close login
    closeLogin.onclick = () => {
        loginModal.classList.add("hidden");
    };

    // close register
    closeRegister.onclick = () => {
        registerModal.classList.add("hidden");
    };

    // Login → Register
    goToRegister.onclick = () => {
        loginModal.classList.add("hidden");
        registerModal.classList.remove("hidden");
        registerModal.classList.add("flex");
    };

    // Register → Login
    goToLogin.onclick = () => {
        registerModal.classList.add("hidden");
        loginModal.classList.remove("hidden");
        loginModal.classList.add("flex");
    };
</script>



</body>
</html>
