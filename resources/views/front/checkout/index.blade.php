    @extends('front.app')
    @section('content')
    <main class="max-w-7xl mx-auto px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">

    <!-- Left Column: Cart & Details -->
    <div class="lg:col-span-7 space-y-12">
        @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{ route('checkout.placeOrder') }}" method="POST">
        @csrf
    <!-- Section 2: Shipping Information -->
    <section class="space-y-6">
    <h2 class="text-2xl font-bold text-on-surface tracking-tight">Shipping Information</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    <div class="col-span-2">
    <input name="customer_name" class="w-full bg-surface-container border-none p-4 focus:ring-2 focus:ring-primary/40 text-on-surface placeholder:text-stone-400" placeholder="Full Name" type="text"/>
    </div>

    <div class="col-span-2">
    <input name="phone"
         type="tel"
    pattern="[0-9]+"
    inputmode="numeric"
    required
    placeholder="Phone Number"
    class="w-full bg-surface-container border-none p-4 focus:ring-2 focus:ring-primary/40 text-on-surface placeholder:text-stone-400">
    </div>

    <div class="col-span-2">
    <input name="address" class="w-full bg-surface-container border-none p-4 focus:ring-2 focus:ring-primary/40 text-on-surface placeholder:text-stone-400" placeholder="Street Address" type="text"/>
    </div>

    <div class="col-span-2">

        <select  id="shipping_zone"  name="shipping_zone_id" class="w-full bg-surface-container border-none p-4 focus:ring-2 focus:ring-primary/40 text-on-surface placeholder:text-stone-400" required>
            <option value="">اختر المدينة</option>
    @foreach($zones as $zone)
            <option value="{{ $zone->id }}" data-price="{{ $zone->price }}">
                {{ $zone->name }} - {{ $zone->price }} جنيه
            </option>
        @endforeach
    </select>
    </div>



    </div>
    </section>
    <!-- Section 3: Payment Options -->
   <section class="space-y-6">

    <h2 class="text-2xl font-bold text-on-surface tracking-tight">
        Payment Method
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        {{-- COD --}}
        <label class="relative flex items-center p-6 bg-surface-container rounded-lg cursor-pointer border-2 border-transparent has-[:checked]:border-primary transition-all">
            <input type="radio" name="payment_method" value="cod" checked onclick="showPayment(this.value)">
            <span class="material-symbols-outlined text-primary text-3xl mr-4">payments</span>

            <div>
                <p class="font-bold text-on-surface">Cash on Delivery</p>
            </div>
        </label>

        {{-- INSTA PAY --}}
        <label class="relative flex items-center p-6 bg-surface-container rounded-lg cursor-pointer border-2 border-transparent has-[:checked]:border-primary transition-all">
            <input type="radio" name="payment_method" value="instapay" onclick="showPayment(this.value)">
            <span class="material-symbols-outlined text-pink-500 text-3xl mr-4">account_balance_wallet</span>

            <div>
                <p class="font-bold text-on-surface">Instapay</p>
            </div>
        </label>

    </div>



    {{-- 🔥 DYNAMIC AREA --}}
    <div id="payment-box" class="mt-6"></div>

</section>
    </div>
    <!-- Right Column: Order Summary (Sticky) -->
    <div class="lg:col-span-5 lg:sticky lg:top-12">
    <div class="bg-surface-container-lowest p-8 lg:p-10 rounded-xl shadow-[0_20px_40px_rgba(0,0,0,0.04)]">
    <h2 class="text-2xl font-bold text-on-surface mb-8 tracking-tight">Order Summary</h2>
    <div class="space-y-4 mb-8">
    <div class="flex justify-between items-center text-on-surface-variant">
    <span>Subtotal</span>
    <span class="font-bold" id="subtotal">{{ $subtotal  }}</span>
    </div>
    <div class="flex justify-between items-center text-on-surface-variant">
    <span>Shipping</span>
    <span id="shipping"> جنيه 0</span>
    </div>
    <div class="flex justify-between items-center text-tertiary" id="discount-row" style="display: none;">
    <span>Promo Discount</span>
    <span class="font-bold" id="discount-amount">0</span>
    </div>
    <div class="pt-4 border-t border-stone-100 flex justify-between items-center text-2xl font-extrabold text-on-surface">
    <span>Total</span>
    <span id="total">{{ $subtotal }}</span>
    </div>
    </div>
    <div class="space-y-4">
    <div class="relative">
    <input id="discount_code_input" class="w-full bg-surface-container border-none p-4 pr-24 focus:ring-2 focus:ring-primary/40 text-on-surface placeholder:text-stone-400" placeholder="Promo code" type="text"/>
    <button type="button" id="apply-discount-btn" class="absolute right-2 top-2 bottom-2 px-4 bg-primary-fixed text-on-primary-fixed font-bold rounded-lg text-sm hover:bg-primary transition-colors">Apply</button>
    </div>
    <div id="discount-message" class="text-sm mt-2"></div>
    <input type="hidden" name="discount_code" id="discount_code_hidden">
    <button  type="submit" class="w-full py-5 bg-gradient-to-r from-primary to-primary-container text-white font-bold text-lg rounded-full shadow-lg hover:scale-[1.02] active:scale-95 transition-all duration-300">
                                Place Order
                            </button>
    </div>
    <div class="mt-8 flex items-center justify-center gap-3 text-stone-400 text-sm">
    <span class="material-symbols-outlined text-lg" data-icon="lock" data-weight="fill">lock</span>
    <p>Secure SSL Encrypted Checkout</p>
    </div>
    <!-- Subtle Benefit Highlight (Asymmetric/Editorial) -->
    <div class="mt-10 p-6 bg-secondary-fixed rounded-lg relative overflow-hidden">
    <span class="material-symbols-outlined absolute -right-4 -bottom-4 text-8xl text-secondary/10" data-icon="eco">eco</span>
    <h4 class="text-on-secondary-fixed font-bold text-lg relative z-10">Fresh Guarantee</h4>
    <p class="text-on-secondary-fixed-variant text-sm mt-1 relative z-10">Harvested within 24 hours of delivery. If it's not fresh, it's free.</p>
    </div>

    </div>
    </div>
    </form>
    </div>

    </main>
    <script>
        let subtotal = {{ $subtotal }};
        let discount = 0; // ممكن تخليه ديناميك بعدين

        const zoneSelect = document.getElementById('shipping_zone');
        const shippingEl = document.getElementById('shipping');
        const totalEl = document.getElementById('total');
        const discountRow = document.getElementById('discount-row');
        const discountAmountEl = document.getElementById('discount-amount');
        const discountMessage = document.getElementById('discount-message');
        const applyDiscountBtn = document.getElementById('apply-discount-btn');
        const discountCodeInput = document.getElementById('discount_code_input');
        const discountCodeHidden = document.getElementById('discount_code_hidden');

        function updateTotal() {
            let selectedOption = zoneSelect.options[zoneSelect.selectedIndex];
            let shippingPrice = selectedOption ? (selectedOption.getAttribute('data-price') || 0) : 0;
            shippingPrice = parseFloat(shippingPrice);
            shippingEl.innerText = shippingPrice + ' جنيه';

            let total = subtotal + shippingPrice - discount;
            totalEl.innerText = Math.max(0, total) + ' جنيه';
        }

        zoneSelect.addEventListener('change', updateTotal);

        applyDiscountBtn.addEventListener('click', function() {
            const code = discountCodeInput.value.trim();
            if (!code) return;

            applyDiscountBtn.disabled = true;
            applyDiscountBtn.innerText = '...';

            fetch('{{ route('checkout.applyDiscount') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ code: code, subtotal: subtotal })
            })
            .then(response => response.json())
            .then(data => {
                applyDiscountBtn.disabled = false;
                applyDiscountBtn.innerText = 'Apply';

                if (data.success) {
                    discount = parseFloat(data.discount_amount);
                    discountCodeHidden.value = code;
                    discountMessage.innerHTML = `<span class="text-green-600">${data.message}</span>`;
                    discountRow.style.display = 'flex';
                    discountAmountEl.innerText = '-' + discount + ' جنيه';
                    updateTotal();
                } else {
                    discount = 0;
                    discountCodeHidden.value = '';
                    discountMessage.innerHTML = `<span class="text-red-600">${data.message}</span>`;
                    discountRow.style.display = 'none';
                    updateTotal();
                }
            })
            .catch(error => {
                applyDiscountBtn.disabled = false;
                applyDiscountBtn.innerText = 'Apply';
                console.error('Error:', error);
            });
        });
    </script>
    <script>
function showPayment(type) {
    let box = document.getElementById('payment-box');

    if (type === 'cod') {
        box.innerHTML = `
            <div class="p-5 bg-gray-100 rounded-lg">
                <p class="font-semibold">💵 Cash on Delivery</p>
                <p class="text-sm text-gray-600">You will pay when the order is delivered.</p>
            </div>
        `;
    }

    if (type === 'online') {
        box.innerHTML = `
            <div class="p-5 bg-blue-50 rounded-lg">
                <p class="font-semibold">💳 Online Payment</p>
                <p class="text-sm text-gray-600">You will be redirected to payment gateway.</p>
            </div>
        `;
    }

if (type === 'instapay') {
    box.innerHTML = `
        <div class="p-5 bg-pink-50 rounded-lg space-y-3 text-right">
            <p class="font-semibold text-lg">📱 InstaPay Payment</p>

            <p class="text-sm">حوّلي المبلغ على الرقم:</p>

            <a href="https://wa.me/201143180001"
               target="_blank"
               class="block font-bold text-lg text-green-600 underline">
               01143180001
            </a>

            <p class="text-xs text-gray-600">
                بعد التحويل ابعتي سكرين شوت على واتساب لتأكيد الطلب يدويًا
            </p>
        </div>
    `;
}
}
</script>

    @endsection
