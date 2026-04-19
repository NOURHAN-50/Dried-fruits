<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;family=Manrope:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
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
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .editorial-shadow {
            box-shadow: 0 20px 40px rgba(26, 28, 28, 0.04);
        }
    </style>
</head>

<body class="bg-background text-on-surface font-body selection:bg-primary-fixed">
    <!-- Top Navigation Bar -->
    <nav
        class="fixed top-4 left-1/2 -translate-x-1/2 w-[92%] rounded-full z-50 bg-white/80 dark:bg-stone-900/80 backdrop-blur-xl shadow-[0_20px_40px_rgba(0,0,0,0.04)] flex justify-between items-center px-8 py-3 max-w-7xl mx-auto">
        <div class="flex items-center gap-12">
            <span
                class="text-2xl font-bold tracking-tight text-green-900 dark:text-green-50 font-headline">Oravida</span>
            <div class="hidden md:flex items-center gap-8 font-['Plus_Jakarta_Sans'] font-medium text-sm tracking-wide">
                <a class="text-green-900 dark:text-white font-bold border-b-2 border-green-800 dark:border-green-200 pb-1"
                    href="#">Shop</a>
                <a class="text-stone-600 dark:text-stone-400 hover:text-green-800 dark:hover:text-green-200 transition-colors"
                    href="#">Stories</a>
                <a class="text-stone-600 dark:text-stone-400 hover:text-green-800 dark:hover:text-green-200 transition-colors"
                    href="#">Wholesale</a>
                <a class="text-stone-600 dark:text-stone-400 hover:text-green-800 dark:hover:text-green-200 transition-colors"
                    href="#">Sustainability</a>
            </div>
        </div>
        <div class="flex items-center gap-5">
            <button class="hover:scale-105 transition-transform duration-300 text-green-800 dark:text-green-200">
                <span class="material-symbols-outlined" data-icon="shopping_cart">shopping_cart</span>
            </button>
            <button class="hover:scale-105 transition-transform duration-300 text-green-800 dark:text-green-200">
                <span class="material-symbols-outlined" data-icon="person">person</span>
            </button>
        </div>
    </nav>
    <main>
        <!-- Hero Section -->
        <section class="pt-32 pb-20 px-6 max-w-7xl mx-auto overflow-hidden">
            <div class="relative flex flex-col md:flex-row items-center gap-16">
                <div class="w-full md:w-1/2 z-10">
                    <span
                        class="inline-block px-4 py-1.5 rounded-full bg-tertiary-fixed text-on-tertiary-fixed text-xs font-label font-bold tracking-widest uppercase mb-6">NEW
                        HARVEST 2024</span>
                    <h1
                        class="font-headline text-5xl md:text-7xl font-extrabold leading-[1.1] text-on-surface mb-8 tracking-tight">
                        Nourish Your Body with Nature's <span class="text-primary italic">Sweetest</span> Bites
                    </h1>
                    <div class="flex flex-wrap gap-4">
                        <button
                            class="bg-gradient-to-r from-primary to-primary-container text-on-primary px-10 py-5 rounded-full font-bold text-lg hover:scale-105 active:scale-95 transition-all editorial-shadow">
                            Shop Now
                        </button>
                        <button
                            class="bg-surface-container-highest text-on-surface px-10 py-5 rounded-full font-bold text-lg hover:bg-surface-variant transition-all">
                            Learn More
                        </button>
                    </div>
                </div>
                <div class="w-full md:w-1/2 relative">
                    <div
                        class="absolute -top-10 -right-10 w-64 h-64 bg-primary-fixed rounded-full blur-[100px] opacity-40">
                    </div>
                    <div
                        class="relative aspect-[4/5] rounded-xl overflow-hidden editorial-shadow transform md:rotate-2">
                        <img class="w-full h-full object-cover"
                            data-alt="Premium glass jars filled with colorful dried mango and apricots sitting on a white stone surface next to fresh split figs and green leaves in bright morning light"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAKimCR7GHSLgxORTvjaj7l9GK1UiyGdwlrHf0P618HW7-61pbSuVNEMNCOpSXTvvDo1fGOcJBjlkFDIXBBe9KiB140a20eyEvO1ylzQhiXTMwmASyzzgxhkvBG2KsYqmy7aJLUrsdmM9s1HyBwNnDG_Ohh-wtX2pEMKzu7vaWjOP0pzDk14cu0Ly8Xek82YI0UdZJqAxnXD-oZSICQGrXot1Jj60nFnnIZ5L9XYlrfGaFkSkRGJfYx2EHUNApvAvVmpc663h1qblUh" />
                    </div>
                    <div
                        class="absolute -bottom-8 -left-8 p-6 bg-surface-container-lowest/80 backdrop-blur-md rounded-lg editorial-shadow max-w-[240px]">
                        <p class="font-headline font-bold text-primary mb-1">100% Organic</p>
                        <p class="text-sm text-on-surface-variant">Zero added sugars, straight from our solar-powered
                            orchard.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Featured Products (Bento Style) -->
        <section class="py-24 bg-surface-container-low px-6">
            <div class="max-w-7xl mx-auto">
                <div class="flex justify-between items-end mb-16">
                    <div>
                        <h2 class="font-headline text-4xl font-bold tracking-tight mb-4">Featured Harvest</h2>
                        <p class="text-on-surface-variant max-w-md">Our curated selection of seasonal favorites, picked
                            at peak ripeness and naturally dried.</p>
                    </div>
                    <a class="text-primary font-bold flex items-center gap-2 group" href="#">
                        Explore All <span
                            class="material-symbols-outlined transition-transform group-hover:translate-x-1"
                            data-icon="arrow_forward">arrow_forward</span>
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
                    <!-- Large Feature -->
                    <div
                        class="md:col-span-7 bg-surface-container-lowest rounded-xl p-10 flex flex-col justify-between relative overflow-hidden group hover:bg-primary-fixed transition-colors duration-500">
                        <div class="relative z-10">
                            <span class="text-xs font-bold tracking-widest text-primary mb-4 block">BESTSELLER</span>
                            <h3 class="font-headline text-3xl font-extrabold mb-4">Medjool Date Bliss</h3>
                            <p class="text-on-surface-variant max-w-xs mb-8">Naturally caramel-sweet, stuffed with
                                roasted walnuts.</p>
                            <span class="text-2xl font-headline font-bold">$24.00</span>
                        </div>
                        <img class="absolute top-0 right-0 h-full w-1/2 object-cover transition-transform duration-700 group-hover:scale-110"
                            data-alt="Close up of dark rich medjool dates arranged artistically on a light linen cloth with scattered sea salt"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuD1svvVq6HPbMhCyFb8I5xWFCjU5KBR9HJB26TwvmcF3fL4jrTxJDez3DyqEz4gFqQ0KOYGd6JftR7RsiU8P0JHWCu681j4qhZq0rPnOy35mZJBvo-SaBvpCnQbuLrUnMqEueIG7ahw-sp6wyJ44LtAgjuyT0dg04CxIiqzIZils6_dBYEAITBRKzWm3Z5So-BQEKlC1hVeJ81ezrqNUOepRy9PP1EOemQ4WK7KAYykFXbX5dCmlboyZRY_E8JlKWN_UBBmMhz_6SGw" />
                    </div>
                    <!-- Vertical Small Feature -->
                    <div
                        class="md:col-span-5 bg-tertiary-container rounded-xl p-10 flex flex-col items-center text-center group">
                        <div class="h-64 mb-8 overflow-hidden rounded-lg">
                            <img class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110"
                                data-alt="Dried pineapple rings stacked neatly against a vibrant pink background showing natural fibrous texture"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAC2XrZtyQ6mtTvtl9PyBsqHWkX4fTwmTEUvPm5Cm_uZPA8JJ1DJ1chVzQcJq5eShfod9DetYo1d4nsP9V72owO4Q0awrsk9LrnRuG4dTE5z1aP-pYNeiZ3USY6TtLbKeDhflNCKhhpKH31N5AFdfCWRKwCZOUpuCtMTfh6byXRSozSswQF9p51VfL__Lo4q3OG-cryiUp3ANLld9scQT1htKKDHGqPU0uXy_w3bf8WjdU4hgeIpVOG3rR1DGHccSP-m3nM03rym56h" />
                        </div>
                        <h3 class="font-headline text-2xl font-bold mb-2 text-on-tertiary-container">Sun-Dried Pineapple
                        </h3>
                        <p class="text-on-tertiary-container/80 mb-6">Tangy, sweet, and perfectly chewy snacks.</p>
                        <button
                            class="bg-on-tertiary-container text-tertiary-container px-6 py-3 rounded-full font-bold">Add
                            to Cart — $18</button>
                    </div>
                    <!-- Horizontal Small -->
                    <div
                        class="md:col-span-12 lg:col-span-4 bg-surface-container-lowest rounded-xl p-8 editorial-shadow group">
                        <div class="flex items-center gap-6">
                            <div class="w-32 h-32 rounded-lg overflow-hidden shrink-0">
                                <img class="h-full w-full object-cover"
                                    data-alt="Golden dried apricots in a simple ceramic bowl on a rustic wooden table"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDOlOedxsjDe0XKTqtZXRPcseW8mqMbySDMGn3wY1yqfwV1j6Wu80ZZlaMXkQ33cxCGmHii7LL10nBCzSeq0wxDAgQgt1UvNaSxUQJhnf78cnlqnrdSiKY2KqVGZsRkX7twTSFTaN1tmDitUf9oNxKmOt1UGpPCqWDOv19Qo1F99yRBucXXQfXzo_V1i5KYXhdnCiAN50kTp8JmCox7u3K5dtEcCJ3swEDDIVYxJJGgO0n362VyiZuf_5Z9ITtdahYfvF-UeO6MoJ3K" />
                            </div>
                            <div>
                                <h4 class="font-headline font-bold text-xl">Golden Apricots</h4>
                                <p class="text-on-surface-variant text-sm mb-4">No sulfites, just pure sun-drenched
                                    flavor.</p>
                                <span class="font-bold text-primary">$16.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- Horizontal Small -->
                    <div
                        class="md:col-span-6 lg:col-span-4 bg-surface-container-lowest rounded-xl p-8 editorial-shadow group">
                        <div class="flex items-center gap-6">
                            <div class="w-32 h-32 rounded-lg overflow-hidden shrink-0">
                                <img class="h-full w-full object-cover"
                                    data-alt="Dried goji berries scattered on a dark slate board with soft moody lighting"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAk2qDB3jFkv3snriYB9HHeM7RkD8ZYXFIAkWmU2GsIY-UE93iE2Qr9YHv5_fGjCmmhnY4RJM-yC67NRGg7ySVJQb3JlMvi333xHaNXBEZ0RLoXrY0ukq5Eb7GoktHMXR9EJDpIugc24lsA7JKToby57GJx5JTZTKpZub53cgbhYIQnafcd7wmOAqoCSPdbYCGv95npYHmGgFbT0ut9t-T8yJdhSEmOysqcmVLwYsKOYEHOGgO2mm73whkuRnmQKlPIAzkjoLHETJXM" />
                            </div>
                            <div>
                                <h4 class="font-headline font-bold text-xl">Superfood Goji</h4>
                                <p class="text-on-surface-variant text-sm mb-4">The ultimate antioxidant boost for your
                                    day.</p>
                                <span class="font-bold text-primary">$22.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- Horizontal Small -->
                    <div
                        class="md:col-span-6 lg:col-span-4 bg-surface-container-lowest rounded-xl p-8 editorial-shadow group">
                        <div class="flex items-center gap-6">
                            <div class="w-32 h-32 rounded-lg overflow-hidden shrink-0">
                                <img class="h-full w-full object-cover"
                                    data-alt="Crispy apple chips thinly sliced and lightly dusted with cinnamon in a bowl"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAxfCQR6BCCs_cL2dbaJISjHXpAvKucJJ08Apg_ugTxjuTnygQqX9DKbezKpz5cndZwG5HQBAX_n__06PlvwLasYwfVid7tXj5mv2N-nsv4bWge0Y1qBs6VmP7avvJVgiDJ4-OFPNDsyZ9ZBrqIEi2FW_IXQSTcR_ALp0QA4BXU0rrNsfVJO6p_LiP0puD1MsrCpR35fzmaFpTv_EFwx-_ehLsT7LE1Fz2DxJ9kc3TPtfD4j69ye1mEAT9zixlDLRa6_QiOz8gdA87A" />
                            </div>
                            <div>
                                <h4 class="font-headline font-bold text-xl">Apple Crisps</h4>
                                <p class="text-on-surface-variant text-sm mb-4">Light, crunchy, and zero guilt
                                    indulgence.</p>
                                <span class="font-bold text-primary">$12.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Best Sellers / Categories -->
        <section class="py-24 px-6 max-w-7xl mx-auto">
            <h2 class="font-headline text-4xl font-bold text-center mb-16 tracking-tight">Voted Favorites</h2>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="group cursor-pointer">
                    <div
                        class="aspect-square rounded-xl overflow-hidden mb-6 bg-surface-container-low transition-transform duration-500 group-hover:-translate-y-2">
                        <img class="w-full h-full object-cover"
                            data-alt="Dried cranberries piled up with water droplets for fresh appearance on a white background"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAkNZptDnDhrlOXQoLm7CVClhhk7N0GRImo_OXS0bZrRmV9wZ8J17_cij1X5_MHkgPciSCcZrW8ZrElPTlZ6q9axWxHPUGeF55oCEFBqrr5pEQv7FZWAIUNdWmwx973ziDosXwloKrK1NgMfkgNzIvC3015-vNLOfm1KPwRMajz6M2di38qDsN62ZIdT-xHLJ8q53PKsgz8HAk-vrJJ5HpiNof_x3xUXh84jKyji6DG7X0UOhIptcGV1892nrkBFzS9zbyHI0zUJWTW" />
                    </div>
                    <h3 class="font-headline font-bold text-lg mb-1">Crimson Cranberries</h3>
                    <p class="text-primary font-bold">$14.50</p>
                    <div class="flex text-tertiary mt-2">
                        <span class="material-symbols-outlined text-sm"
                            style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm"
                            style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm"
                            style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm"
                            style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm"
                            style="font-variation-settings: 'FILL' 1;">star</span>
                    </div>
                </div>
                <div class="group cursor-pointer">
                    <div
                        class="aspect-square rounded-xl overflow-hidden mb-6 bg-surface-container-low transition-transform duration-500 group-hover:-translate-y-2">
                        <img class="w-full h-full object-cover"
                            data-alt="Rich purple dried plums or prunes in a minimalist white bowl"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCLvXDHo-LeD6FmuNzD6YkgCXz6Iqmk9l2rqHYm62R9QbItCH0BGX7LCSAC55WzfNWLyoGc6O2dVnT41EFJGi0EgBjbOIPsNKzvz7CH0GWqv1ZuvT7SQBlaQL7OJmTSToFYl6DQNEDGi2TLjZ8CubeRZ0-pMM_KkHdv3c0ek6RElQdcggwMqMqNAtjkcU_jbpM7rQFNgFxTZAOznlQDfv8CJvE64tQB2onLqNeWyWwvWZLpvwnvigKBBmXgzThIK3fFGy90tiPTZKov" />
                    </div>
                    <h3 class="font-headline font-bold text-lg mb-1">Honeyed Prunes</h3>
                    <p class="text-primary font-bold">$11.00</p>
                    <div class="flex text-tertiary mt-2">
                        <span class="material-symbols-outlined text-sm"
                            style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm"
                            style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm"
                            style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm"
                            style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm"
                            style="font-variation-settings: 'FILL' 0;">star</span>
                    </div>
                </div>
                <div class="group cursor-pointer">
                    <div
                        class="aspect-square rounded-xl overflow-hidden mb-6 bg-surface-container-low transition-transform duration-500 group-hover:-translate-y-2">
                        <img class="w-full h-full object-cover"
                            data-alt="Dried figs sliced open to reveal their seeded interior, artistic side lighting"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCjM-oYJuAKEyrJHecNekZYOQevy2-jggOgNe4HUtgwrm27AMN_zWPkUBYru-hY6SSyiHnQT2F3iKV62oaGSJj_MfkXuFJdWSLMNT2IgS3LOyBvDhi_6nCAHhQM16THWxdyRdFHsCizeTq9WLgaXlfrCS7tB2ZrL_-6GqB1eS8PArb1aOyMKd_KkgyGLKovRbEzpOX0rh2dGYOcZHdj_7yGg6mCm-vx-P3OqpMh7uyOY-_7RsVsSaMG4T-g4oTvsT8CiiFTSU9xtAsG" />
                    </div>
                    <h3 class="font-headline font-bold text-lg mb-1">Turkish Fig Medley</h3>
                    <p class="text-primary font-bold">$19.00</p>
                    <div class="flex text-tertiary mt-2">
                        <span class="material-symbols-outlined text-sm"
                            style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm"
                            style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm"
                            style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm"
                            style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm"
                            style="font-variation-settings: 'FILL' 1;">star</span>
                    </div>
                </div>
                <div class="group cursor-pointer">
                    <div
                        class="aspect-square rounded-xl overflow-hidden mb-6 bg-surface-container-low transition-transform duration-500 group-hover:-translate-y-2">
                        <img class="w-full h-full object-cover"
                            data-alt="Sun-dried tomato strips in an artisan jar with olive oil and herbs"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDJZrquc-tceItk4VmCvOdrLRS3yecCmr0RxGJINROKP9X-cpPJpjH3IFnTWgwmm1R9o_ja9NdwObNnUXJWyeqaxkL2-eZxndEOIspVI-vCNxNx3IJhJ_D64U_5Y_nF5MsYgPcxRHp3VrHjq3m4Cqlyw0srU_ZkWJ-6k1GB7yMgv2gvbuihhypm8QfGzeWdYIV2yhueKmnBhJHaH__RgI6HPvdeyYubSvzZIPtgZXIFwNG4g5gp9wc7BFalTNlp04NYjtKrHvP5G7-p" />
                    </div>
                    <h3 class="font-headline font-bold text-lg mb-1">Savory Sun-Tomatoes</h3>
                    <p class="text-primary font-bold">$21.00</p>
                    <div class="flex text-tertiary mt-2">
                        <span class="material-symbols-outlined text-sm"
                            style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm"
                            style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm"
                            style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm"
                            style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-sm"
                            style="font-variation-settings: 'FILL' 1;">star</span>
                    </div>
                </div>
            </div>
        </section>
        <!-- Customer Reviews -->
        <section class="py-24 bg-surface-bright px-6 overflow-hidden">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col items-center text-center mb-16">
                    <span class="text-xs font-bold tracking-[0.2em] text-primary mb-4 uppercase">Testimonials</span>
                    <h2 class="font-headline text-4xl font-bold tracking-tight">The Joy of Real Fruit</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-surface-container-lowest p-8 rounded-xl editorial-shadow relative">
                        <div
                            class="absolute -top-4 -left-4 w-12 h-12 bg-primary-fixed rounded-full flex items-center justify-center text-on-primary-fixed">
                            <span class="material-symbols-outlined" data-icon="format_quote">format_quote</span>
                        </div>
                        <p class="italic text-on-surface mb-6 leading-relaxed">"Oravida's mango slices are a
                            revelation. No sugar-coating, just pure, tropical sunshine. I finally found a snack my kids
                            and I both love."</p>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-surface-container-high overflow-hidden">
                                <img data-alt="Portrait of a smiling woman with glasses in a natural outdoor setting"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBL_pzGXwrlVT0ger1HxoyRrDlIZRKPwMAXtKgf3i8QFcth453F7BC_bSzxMpEPCZB_hyC9HGGckrqGTYAfO24hH15QxPcmx0ivD2W9gB55x17Pq1PTUHEcwyn8rQlL1K0QiCYVfm6XQRaINrAhGnwd4UZR_wtTNX-RGfgwvyRQF1csryiLPN5VGIHv-BNn22BZbvEMzFqPxKuIee-Y5-3KqpBHzfaywS51hs2kL7dO6Eq6uwzCkXYgSsy6YL_IrCDDDmsenRrJL06K" />
                            </div>
                            <div>
                                <h4 class="font-bold text-sm">Elena Rodriguez</h4>
                                <p class="text-xs text-on-surface-variant">Certified Nutritionist</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-surface-container-lowest p-8 rounded-xl editorial-shadow relative md:translate-y-8">
                        <div
                            class="absolute -top-4 -left-4 w-12 h-12 bg-tertiary-fixed rounded-full flex items-center justify-center text-on-tertiary-fixed">
                            <span class="material-symbols-outlined" data-icon="format_quote">format_quote</span>
                        </div>
                        <p class="italic text-on-surface mb-6 leading-relaxed">"The presentation and quality of these
                            dried fruits are unmatched. It feels like an editorial magazine delivered to your door. The
                            dates are incredible."</p>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-surface-container-high overflow-hidden">
                                <img data-alt="Portrait of a man with a beard and a thoughtful expression in soft studio light"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBlqW1yGHqbHvZMl4h5xlWSvRdB3JW58o1FyfQp1yRsfN2-hlXEk5yFCMXY9_fT18LPjk59QNfSfuzBtTntLFDZR5U1htqvcaJquOguyQBx8vK9Vu8_b1Vn1DnuI-imvh4P0RidTPYA8AtLr1ifTF3NzMOLtbZo-3kefbeHHVzRBKRXJTuOJjfedwIlhLi4SEudfEOmZ0OKEYpt-ds4UhL_FlVTwxlkM7C3aVPGJuFmsFBWjJQNt4IYEzWyO_aaK2E7gWIrPnrqWjeD" />
                            </div>
                            <div>
                                <h4 class="font-bold text-sm">Marcus Chen</h4>
                                <p class="text-xs text-on-surface-variant">Home Chef</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-surface-container-lowest p-8 rounded-xl editorial-shadow relative">
                        <div
                            class="absolute -top-4 -left-4 w-12 h-12 bg-secondary-fixed rounded-full flex items-center justify-center text-on-secondary-fixed">
                            <span class="material-symbols-outlined" data-icon="format_quote">format_quote</span>
                        </div>
                        <p class="italic text-on-surface mb-6 leading-relaxed">"Sustainability matters to me, and
                            knowing Oravida uses solar-powered dehydration makes every bite taste even better. High
                            quality, conscious brand."</p>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-surface-container-high overflow-hidden">
                                <img data-alt="Portrait of a young woman looking confidently into the camera in a modern interior"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCFQ9lbu9hdjU0lxllg-VmCYRd99ak_jiDmKYTaL3tZXXurAK6veLtDVImZqpl2DrBX-LPVcFdCauwOeaQuEuOjEaLjRH-bUPvMptfie_K--ym3XeKEVy6IOYYu6XvzY-MA6vpi3QWZlos67goTUPnDmiIInQ1I4bF98cZleDHE81z8lIatS-_qoYgkIF0B6VBn560PxEdXDlkGBcm6c0xiFjp1NNnmOhdhybeU3OMyUG_3i2Pg6A9cwISXF0ftNXGrC3UK8aV-VjEE" />
                            </div>
                            <div>
                                <h4 class="font-bold text-sm">Sarah Jenkins</h4>
                                <p class="text-xs text-on-surface-variant">Eco-Advocate</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Newsletter / CTA -->
        <section class="py-24 px-6">
            <div class="max-w-5xl mx-auto bg-primary rounded-xl p-12 md:p-20 text-center relative overflow-hidden">
                <div
                    class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2">
                </div>
                <div class="relative z-10">
                    <h2 class="font-headline text-4xl md:text-5xl font-bold text-on-primary mb-6">Join the Orchard Club
                    </h2>
                    <p class="text-primary-fixed/80 max-w-lg mx-auto mb-10">Sign up for 15% off your first order and
                        stay updated with seasonal harvests and healthy recipes.</p>
                    <form class="flex flex-col md:flex-row gap-4 max-w-md mx-auto">
                        <input
                            class="flex-grow px-6 py-4 rounded-full border-none focus:ring-2 focus:ring-primary-fixed outline-none text-on-surface"
                            placeholder="Your email address" type="email" />
                        <button
                            class="bg-tertiary-container text-on-tertiary-container px-8 py-4 rounded-full font-bold hover:bg-tertiary-fixed transition-colors">Subscribe</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <footer
        class="bg-stone-100 dark:bg-stone-950 w-full mt-20 pt-16 pb-8 text-green-900 dark:text-green-100 font-['Manrope'] text-sm leading-relaxed">
        <div class="max-w-7xl mx-auto px-8 grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="col-span-1 md:col-span-1">
                <span class="text-xl font-bold text-green-900 dark:text-green-50 mb-4 block">Oravida</span>
                <p class="text-stone-500 dark:text-stone-400 mb-6">Honest fruit, dried by the sun, packed with
                    nutrients for a balanced lifestyle.</p>
            </div>
            <div>
                <h4 class="font-bold mb-6 text-green-900 dark:text-green-50">Shop</h4>
                <ul class="space-y-4 text-stone-500 dark:text-stone-400">
                    <li><a class="hover:text-green-700 dark:hover:text-green-300 transition-colors" href="#">All
                            Products</a></li>
                    <li><a class="hover:text-green-700 dark:hover:text-green-300 transition-colors"
                            href="#">Bundles</a></li>
                    <li><a class="hover:text-green-700 dark:hover:text-green-300 transition-colors"
                            href="#">Gifting</a></li>
                    <li><a class="hover:text-green-700 dark:hover:text-green-300 transition-colors"
                            href="#">Subscription</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-6 text-green-900 dark:text-green-50">Company</h4>
                <ul class="space-y-4 text-stone-500 dark:text-stone-400">
                    <li><a class="hover:text-green-700 dark:hover:text-green-300 transition-colors" href="#">Our
                            Story</a></li>
                    <li><a class="hover:text-green-700 dark:hover:text-green-300 transition-colors"
                            href="#">Sustainability</a></li>
                    <li><a class="hover:text-green-700 dark:hover:text-green-300 transition-colors"
                            href="#">Contact Us</a></li>
                    <li><a class="hover:text-green-700 dark:hover:text-green-300 transition-colors"
                            href="#">Wholesale</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-6 text-green-900 dark:text-green-50">Legal</h4>
                <ul class="space-y-4 text-stone-500 dark:text-stone-400">
                    <li><a class="hover:text-green-700 dark:hover:text-green-300 transition-colors"
                            href="#">Shipping Policy</a></li>
                    <li><a class="hover:text-green-700 dark:hover:text-green-300 transition-colors"
                            href="#">Terms of Service</a></li>
                    <li><a class="hover:text-green-700 dark:hover:text-green-300 transition-colors"
                            href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
        <div
            class="max-w-7xl mx-auto px-8 mt-16 pt-8 border-t border-stone-200 dark:border-stone-800 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-stone-500 dark:text-stone-400">© 2024 Oravida Organic Orchard. All rights reserved.</p>
            <div class="flex gap-6">
                <a class="text-stone-500 dark:text-stone-400 hover:text-green-700 dark:hover:text-green-300"
                    href="#">Instagram</a>
                <a class="text-stone-500 dark:text-stone-400 hover:text-green-700 dark:hover:text-green-300"
                    href="#">LinkedIn</a>
            </div>
        </div>
    </footer>
</body>

</html>
