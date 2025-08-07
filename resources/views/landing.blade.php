<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex-shrink-0 flex items-center">
                    <span class="text-2xl font-bold text-indigo-600">Logo</span>
                </div>
                <div class="hidden sm:flex sm:items-center justify-center flex-1">
                    <div class="flex space-x-4">
                        <a href="#" class="px-3 py-2 text-sm font-medium text-gray-900 hover:text-indigo-600">Home</a>
                        <a href="#" class="px-3 py-2 text-sm font-medium text-gray-900 hover:text-indigo-600">Features</a>
                        <a href="#" class="px-3 py-2 text-sm font-medium text-gray-900 hover:text-indigo-600">About</a>
                        <a href="#" class="px-3 py-2 text-sm font-medium text-gray-900 hover:text-indigo-600">Contact</a>
                    </div>
                </div>
                <div class="flex md:order-2 items-center">
                    <a href="{{ route('login') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</a>
                    <button type="button" data-collapse-toggle="navbar-default" aria-controls="navbar-default" aria-expanded="false" class="inline-flex items-center p-2 text-gray-500 hover:text-indigo-600 sm:hidden ml-2">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="hidden sm:hidden" id="navbar-default">
            <div class="pt-2 pb-3 space-y-1">
                <a href="#" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-900 hover:bg-indigo-50 hover:text-indigo-600">Home</a>
                <a href="#" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-900 hover:bg-indigo-50 hover:text-indigo-600">Features</a>
                <a href="#" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-900 hover:bg-indigo-50 hover:text-indigo-600">About</a>
                <a href="#" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-900 hover:bg-indigo-50 hover:text-indigo-600">Contact</a>
                <a href="#" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-900 hover:bg-indigo-50 hover:text-indigo-600">Login</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-indigo-600 text-white md:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
            <h1 class="text-4xl font-extrabold sm:text-5xl md:text-6xl">Selamat Datang di Website Kami</h1>
            <p class="mt-4 text-xl max-w-2xl mx-auto">Kami menyediakan solusi terbaik untuk kebutuhan Anda dengan teknologi modern dan layanan terbaik.</p>
            <div class="mt-8">
                <a href="#" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-100">Mulai Sekarang</a>
            </div>
        </div>
    </section>

<!-- Features Section -->
<section class="md:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold text-gray-900 text-center dark:text-white">Produk Unggulan</h2>

        <!-- Scrollable Product Cards -->
        <div class="mt-12 overflow-x-auto">
            <div class="flex space-x-6 w-max pb-4">
                @foreach ($produks as $produk)
                    <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 w-64 flex-shrink-0">
                        <img src="{{ asset('storage/foto_produk/' . $produk->foto) }}"
                             class="rounded-t-lg w-full h-48 object-cover"
                             alt="{{ $produk->nama }}"
                             onerror="this.src='{{ asset('images/fallback.jpg') }}'">
                        <div class="p-4">
                            <h5 class="text-lg font-bold text-gray-900 dark:text-white">{{ $produk->nama }}</h5>
                            <p class="text-sm text-gray-700 dark:text-gray-300 line-clamp-2">{{ $produk->deskripsi }}</p>
                            <button data-modal-target="modal-detail-{{ $produk->id }}"
                                    data-modal-toggle="modal-detail-{{ $produk->id }}"
                                    class="mt-4 inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:outline-none dark:bg-blue-600 dark:hover:bg-blue-700">
                                Lihat Detail
                            </button>
                        </div>
                    </div>

                    <!-- Modal Detail -->
                    <div id="modal-detail-{{ $produk->id }}" tabindex="-1" aria-hidden="true"
                         class="hidden fixed top-0 left-0 right-0 z-50 items-center justify-center w-full h-full bg-black/50">
                        <div class="relative w-full max-w-md p-4">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        {{ $produk->nama }}
                                    </h3>
                                    <button type="button" class="text-gray-400 hover:text-gray-900 dark:hover:text-white"
                                            data-modal-hide="modal-detail-{{ $produk->id }}">
                                        ✕
                                    </button>
                                </div>
                                <div class="p-4 space-y-3">
                                    <img src="{{ asset('storage/foto_produk/' . $produk->foto) }}"
                                         class="w-full h-48 object-cover rounded"
                                         alt="{{ $produk->nama }}"
                                         onerror="this.src='{{ asset('images/fallback.jpg') }}'">
                                    <p class="text-sm text-gray-700 dark:text-gray-300">
                                        {{ $produk->deskripsi }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


    <!-- Footer -->
    <footer class="bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-semibold">Tentang Kami</h3>
                    <p class="mt-4 text-gray-300">Kami adalah perusahaan yang berdedikasi untuk memberikan solusi terbaik bagi pelanggan kami.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold">Tautan Cepat</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white">Home</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Features</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">About</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold">Kontak</h3>
                    <p class="mt-4 text-gray-300">Email: info@website.com</p>
                    <p class="text-gray-300">Telepon: +62 123 456 789</p>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-700 pt-8 text-center">
                <p class="text-gray-300">&copy; 2025 Nama Perusahaan. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>