<head>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<div class="text-center">
    <h1 class="text-3xl font-bold text-blue-600">Selamat Datang</h1>
    <p class="text-gray-600 mt-2">Aplikasi untuk bisnis Anda.</p>

    <li class="relative" x-data="{ open: false }">
        <button @click="open = !open" class="hover:underline focus:outline-none">
            Product Category ▼
        </button>
        <ul x-show="open" @click.away="open = false" class="absolute left-0 mt-2 w-48 bg-white text-black rounded-md shadow-lg">
            <li><a href="{{ url('/category/food-beverage') }}" class="block px-4 py-2 hover:bg-gray-200">Food & Beverage</a></li>
            <li><a href="{{ url('/category/beauty-health') }}" class="block px-4 py-2 hover:bg-gray-200">Beauty & Health</a></li>
            <li><a href="{{ url('/category/home-care') }}" class="block px-4 py-2 hover:bg-gray-200">Home Care</a></li>
            <li><a href="{{ url('/category/baby-kid') }}" class="block px-4 py-2 hover:bg-gray-200">Baby & Kid</a></li>
        </ul>
    </li>
    <ul class="flex space-x-4">
        <li><a href="{{ url('/user/1/name/Joko') }}" class="hover:underline">User Profile</a></li>
        <li><a href="{{ url('/sales') }}" class="hover:underline">Sales</a></li>
    </ul>
</div>

