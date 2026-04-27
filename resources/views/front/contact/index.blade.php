@extends('front.app')
@section('content')
<main class="pt-32 pb-24">
<!-- Hero Header -->
<section class="max-w-7xl mx-auto px-8 mb-24 text-center">
<span class="text-primary font-bold uppercase tracking-widest text-xs mb-4 block">Reach Out</span>
<h1 class="text-6xl md:text-7xl font-extrabold text-on-surface tracking-tight mb-6">Get in Touch</h1>
<p class="text-on-surface-variant max-w-2xl mx-auto text-lg leading-relaxed">
                Whether you're curious about our botanical sourcing or just want to share your journey, we’re here to cultivate conversation.
            </p>
</section>
<!-- Contact Section: Asymmetric Layout -->
<section class="max-w-7xl mx-auto px-8 grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
<!-- Contact Details & Map (Left Column) -->
<div class="lg:col-span-5 space-y-12">
<div class="space-y-8">
<div class="flex items-start gap-6 group">
<div class="w-14 h-14 rounded-2xl bg-primary-fixed flex items-center justify-center text-primary group-hover:scale-110 transition-transform duration-300">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">call</span>
</div>
<div>
<h3 class="text-xs uppercase tracking-widest font-bold text-outline mb-1">Call Us</h3>
<a href="tel:01143180001" class="text-xl font-semibold text-on-surface hover:text-primary transition-colors duration-300">
    01143180001
</a>
<p class="text-sm text-on-surface-variant">Mon-Fri, 9am - 6pm EST</p>
</div>
</div>
<div class="flex items-start gap-6 group">
<div class="w-14 h-14 rounded-2xl bg-tertiary-fixed flex items-center justify-center text-tertiary group-hover:scale-110 transition-transform duration-300">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">mail</span>
</div>
<div>
<h3 class="text-xs uppercase tracking-widest font-bold text-outline mb-1">Email Us</h3>
<p class="text-xl font-semibold text-on-surface">hello@modernorchard.com</p>
<p class="text-sm text-on-surface-variant">We respond within 24 hours</p>
</div>
</div>
</div>
<!-- Stylized Image/Visual -->
<div class="relative mt-16 group">
<div class="absolute -inset-4 bg-tertiary-fixed rounded-xl -z-10 group-hover:translate-x-2 group-hover:translate-y-2 transition-transform duration-500"></div>
<img alt="A serene sun-drenched organic orchard with rows of apple trees and soft morning mist over green grass" class="w-full aspect-[4/5] object-cover rounded-xl shadow-lg" data-alt="close-up of fresh green organic apples hanging from a tree branch in a sun-drenched orchard with soft bokeh background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDk_Dk2eLK-Tf-JnY4HtJdRIPn73jyCwbcEZ82zRKJR3pLTqAnamG2O4tFXbQRwNep9e8zwjyUsFz_mvvLBQwVMzcf0fE5Cz8JHrD5FozDuGba6ntxEiLK5EgHjx-gE4xuaYRDXWtLhdoFDKXuUJn_XtRMbVEIm2ycZjvBUgI19pAYYvy0Y2r-FNrwMAPXGCqxA3O_26wCZJNMcJOMhVLFzZeXkYMe2_fPPTll8X1JLu5WkCatVqgEpv1dCFlnN3tCGcgrtwcCFPu6W"/>
<div class="absolute bottom-6 left-6 right-6 p-6 bg-white/60 backdrop-blur-md rounded-lg">
<p class="text-primary font-bold italic">"Grown with intention, delivered with care."</p>
</div>
</div>
</div>
<!-- Contact Form (Right Column) -->
<div class="lg:col-span-7 bg-surface-container-lowest p-10 md:p-16 rounded-xl shadow-[0_40px_80px_rgba(0,0,0,0.03)] border border-outline-variant/10">
@if(session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
        {{ session('success') }}
    </div>
@endif
<form class="space-y-8" method="POST" action="{{ route('contact.send') }}">
    @csrf
<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
<div class="space-y-2">
<label class="text-xs uppercase tracking-widest font-bold text-on-surface-variant ml-1">Full Name</label>
<input name="name" class="w-full bg-surface-container border-none rounded-sm px-6 py-4 focus:ring-2 focus:ring-primary/40 transition-all placeholder:text-outline-variant" placeholder="John Doe" type="text"/>
</div>
<div class="space-y-2">
<label class="text-xs uppercase tracking-widest font-bold text-on-surface-variant ml-1">Email Address</label>
<input name="email" class="w-full bg-surface-container border-none rounded-sm px-6 py-4 focus:ring-2 focus:ring-primary/40 transition-all placeholder:text-outline-variant" placeholder="john@example.com" type="email"/>
</div>
</div>
<div class="space-y-2">
<label class="text-xs uppercase tracking-widest font-bold text-on-surface-variant ml-1">Subject</label>
<input name="subject"class="w-full bg-surface-container border-none rounded-sm px-6 py-4 focus:ring-2 focus:ring-primary/40 transition-all placeholder:text-outline-variant" placeholder="How can we help?" type="text"/>
</div>
<div class="space-y-2">
<label class="text-xs uppercase tracking-widest font-bold text-on-surface-variant ml-1">Your Message</label>
<textarea name="message" class="w-full bg-surface-container border-none rounded-sm px-6 py-4 focus:ring-2 focus:ring-primary/40 transition-all placeholder:text-outline-variant resize-none" placeholder="Tell us about your wellness goals..." rows="6"></textarea>
</div>
<button   class="w-full bg-gradient-to-r from-primary to-primary-container text-on-primary font-bold py-5 rounded-full shadow-xl shadow-primary/10 hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center gap-3" type="submit">
                        Send Message
                        <span class="material-symbols-outlined">send</span>
</button>
</form>
</div>
</section>
<!-- FAQ Section -->
<section class="max-w-5xl mx-auto px-8 mt-40">
<div class="text-center mb-16">
<h2 class="text-4xl font-extrabold tracking-tight mb-4">Common Enquiries</h2>
<div class="h-1 w-20 bg-tertiary-container mx-auto rounded-full"></div>
</div>
<div class="space-y-4">
<div class="bg-surface-container-low rounded-lg p-6 group cursor-pointer hover:bg-surface-container transition-colors">
<div class="flex justify-between items-center">
<h4 class="font-bold text-on-surface">Where do you source your botanical ingredients?</h4>
<span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">add</span>
</div>
</div>
<div class="bg-surface-container-low rounded-lg p-6 group cursor-pointer hover:bg-surface-container transition-colors">
<div class="flex justify-between items-center">
<h4 class="font-bold text-on-surface">How long does international shipping take?</h4>
<span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">add</span>
</div>
</div>
<div class="bg-surface-container-low rounded-lg p-6 group cursor-pointer hover:bg-surface-container transition-colors border-2 border-primary-fixed/30 shadow-sm">
<div class="flex justify-between items-center mb-4">
<h4 class="font-bold text-primary">Are your skincare products organic?</h4>
<span class="material-symbols-outlined text-primary">remove</span>
</div>
<p class="text-on-surface-variant text-sm leading-relaxed">
                        Absolutely. Every ingredient in our Modern Orchard line is certified organic and sustainably harvested. We believe that what goes on your skin should be as pure as what goes in your body.
                    </p>
</div>
<div class="bg-surface-container-low rounded-lg p-6 group cursor-pointer hover:bg-surface-container transition-colors">
<div class="flex justify-between items-center">
<h4 class="font-bold text-on-surface">Do you offer wholesale opportunities for retailers?</h4>
<span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">add</span>
</div>
</div>
</div>
</section>
<!-- Map Section -->
<section class="mt-40 px-8 max-w-7xl mx-auto">
<div class="h-[450px] w-full rounded-xl overflow-hidden relative group">
<div class="absolute inset-0 bg-primary/10 mix-blend-multiply z-10 pointer-events-none"></div>
<div class="absolute inset-0 z-0 overflow-hidden">
<img alt="Artistic top-down map of Hudson Valley region with botanical illustrations and gold markers" class="w-full h-full object-cover grayscale opacity-80 group-hover:grayscale-0 group-hover:scale-105 transition-all duration-1000" data-alt="minimalist map of hudson valley New York with clean lines and soft earthy colors for a premium botanical brand location" data-location="Hudson Valley, NY" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD6uMTjZtXdX4KMGTDrIy-qrhHr11bshdCWNaAi4qvmo97dIDRE0aezLmo7GbE-2BkBgXO3WEgSKOlG-IAgC5Ded5d4gRWJXwg51vvvspj-wAtqDwUPFZ8Dz3zoDK0aebAAq6Z-Sj6V1DkQv5wC6rYofHKOy172Ajyxxkt44jIFCv-0LYoWOpsV0UmBt_QPraG5uOvjIBobrWhCY_Kqpz1XUSbhi-KQmQoiiqkD6k36M2mk9znSrJYIF7H7rbSPdDIGkuH_CzW9HZvR"/>
</div>
<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-20 flex flex-col items-center">
<div class="w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center shadow-2xl animate-bounce">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">location_on</span>
</div>
<div class="mt-4 bg-white px-4 py-2 rounded-full shadow-lg text-xs font-bold uppercase tracking-widest">Our Roots</div>
</div>
</div>
</section>
</main>

@endsection
