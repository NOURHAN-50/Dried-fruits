@extends('front.app')
@section('content')
<div id="registerModal" class="fixed inset-0 bg-black/40 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-2xl w-[350px] shadow-lg relative mx-auto">

        <h2 class="text-xl font-bold mb-4 text-center">Create Account</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <input type="text" name="name" placeholder="Name"
                class="w-full mb-3 p-2 border rounded-lg" />
            @error('name')
                <small class="text-red-500 block mb-2">{{ $message }}</small>
            @enderror

            <input type="email" name="email" placeholder="Email"
                class="w-full mb-3 p-2 border rounded-lg" />
            @error('email')
                <small class="text-red-500 block mb-2">{{ $message }}</small>
            @enderror

            <input type="password" name="password" placeholder="Password"
                class="w-full mb-4 p-2 border rounded-lg" />
            @error('password')
                <small class="text-red-500 block mb-2">{{ $message }}</small>
            @enderror

            <button class="w-full bg-green-700 text-white py-2 rounded-lg">
                Register
            </button>
        </form>

    </div>
</div>


@endsection
