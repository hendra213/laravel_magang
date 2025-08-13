<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
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
                    <span class="text-2xl font-bold text-indigo-600">Banana</span>
                </div>
                <div class="hidden sm:flex sm:items-center justify-center flex-1">
                    <div class="flex space-x-4">
                        <a href="#hero"
                            class="px-3 py-2 text-sm font-medium text-gray-900 hover:text-indigo-600">Home</a>
                        <a href="#features"
                            class="px-3 py-2 text-sm font-medium text-gray-900 hover:text-indigo-600">Features</a>
                        <a href="#footer"
                            class="px-3 py-2 text-sm font-medium text-gray-900 hover:text-indigo-600">Contact</a>
                    </div>
                </div>
                <div class="flex md:order-2 items-center">
                    <a href="{{ route('login') }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</a>
                    <button type="button" data-collapse-toggle="navbar-default" aria-controls="navbar-default"
                        aria-expanded="false"
                        class="inline-flex items-center p-2 text-gray-500 hover:text-indigo-600 sm:hidden ml-2">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="hidden sm:hidden" id="navbar-default">
            <div class="pt-2 pb-3 space-y-1">
                <a href="#hero"
                    class="block pl-3 pr-4 py-2 text-base font-medium text-gray-900 hover:bg-indigo-50 hover:text-indigo-600">Home</a>
                <a href="#features"
                    class="block pl-3 pr-4 py-2 text-base font-medium text-gray-900 hover:bg-indigo-50 hover:text-indigo-600">Features</a>
                <a href="#footer"
                    class="block pl-3 pr-4 py-2 text-base font-medium text-gray-900 hover:bg-indigo-50 hover:text-indigo-600">Contact</a>
                <a href="{{ route('login') }}"
                    class="block pl-3 pr-4 py-2 text-base font-medium text-gray-900 hover:bg-indigo-50 hover:text-indigo-600">Login</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero" class="relative w-full bg-indigo-600 text-white md:py-20">
        <!-- Carousel Background -->
        <div id="hero-carousel" class="absolute inset-0 -z-10" data-carousel="slide">
            <div class="relative h-full overflow-hidden rounded-lg">
                <!-- Slide 1 -->
                <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                    <img src="/docs/images/carousel/carousel-1.svg" class="absolute w-full h-full object-cover"
                        alt="Slide 1">
                </div>
                <!-- Slide 2 -->
                <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                    <img src="/docs/images/carousel/carousel-2.svg" class="absolute w-full h-full object-cover"
                        alt="Slide 2">
                </div>
                <!-- Slide 3 -->
                <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                    <img src="/docs/images/carousel/carousel-3.svg" class="absolute w-full h-full object-cover"
                        alt="Slide 3">
                </div>
            </div>
        </div>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-50 -z-10"></div>

        <!-- Konten -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
            <h1 class="text-4xl font-extrabold sm:text-5xl md:text-6xl">Selamat Datang di Website Kami</h1>
            <p class="mt-4 text-xl max-w-2xl mx-auto">
                Kami menyediakan solusi terbaik untuk kebutuhan Anda dengan teknologi modern dan layanan terbaik.
            </p>
            <div class="mt-8">
                <a href="{{ route('login') }}"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-100">
                    Mulai Sekarang
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="min-h-screen flex items-start bg-gray-50 dark:bg-gray-900 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">

            <!-- Heading -->
            <h2 class="text-3xl font-extrabold text-gray-900 text-center dark:text-white mb-12 m-20">
                Fitur Utama
            </h2>

            <!-- Cards Grid -->
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">

                <!-- Card 1 -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 transform transition duration-300 hover:scale-105 hover:shadow-xl">
                    <div
                        class="flex items-center justify-center w-16 h-16 mx-auto bg-indigo-100 rounded-full dark:bg-indigo-900 mb-4">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5.121 17.804A9.003 9.003 0 0112 15a9.003 9.003 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3 text-center">
                        User Level (Admin &amp; Pengguna)
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Kelola hak akses untuk admin dan pengguna secara mudah dengan sistem manajemen user yang aman.
                    </p>
                </div>

                <!-- Card 2 -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 transform transition duration-300 hover:scale-105 hover:shadow-xl">
                    <div
                        class="flex items-center justify-center w-16 h-16 mx-auto bg-green-100 rounded-full dark:bg-green-900 mb-4">
                        <svg class="w-8 h-8 text-green-600 dark:text-green-300" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h10m-4 4h4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3 text-center">
                        CRUD Stok Barang
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Tambah, ubah, hapus, dan kelola stok barang dengan tampilan yang sederhana dan cepat.
                    </p>
                </div>

                <!-- Card 3 -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 transform transition duration-300 hover:scale-105 hover:shadow-xl">
                    <div
                        class="flex items-center justify-center w-16 h-16 mx-auto bg-yellow-100 rounded-full dark:bg-yellow-900 mb-4">
                        <svg class="w-8 h-8 text-purple-600 dark:text-purple-300" fill="none"
                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3 text-center">
                        CRUD API
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 text-center">
                        Akses dan kelola data melalui API untuk integrasi dengan aplikasi lain secara efisien.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="footer" class="bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-semibold">Tentang Kami</h3>
                    <p class="mt-4 text-gray-300">Kami adalah perusahaan yang berdedikasi untuk memberikan solusi
                        terbaik bagi pelanggan kami.</p>
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
                <p class="text-gray-300">&copy; 2025 Gedang Goreng. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- CDN Flowbite -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>