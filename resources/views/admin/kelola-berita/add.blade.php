@extends('template.admin')

@section('title', 'Form Flowbite')

@section('content')
<div class="p-4 md:ml-64">
    <section class="bg-white dark:bg-gray-900 px-4 py-8 md:py-16">
        <div class="mx-auto grid max-w-screen-xl rounded-lg bg-gray-50 dark:bg-gray-800 p-4 md:p-8 lg:grid-cols-12 lg:gap-8 lg:p-16 xl:gap-16">
            
            <!-- Form Start -->
            <div class="lg:col-span-8 xl:col-span-6 w-full">
<form action="{{ route('addberita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf

    <!-- Nama -->
    <div class="max-w-md">
        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Produk</label>
        <input type="text" id="nama" name="nama" required placeholder="Contoh: Susu UHT"
            class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <!-- Jumlah -->
    <div class="max-w-md">
        <label for="jumlah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
        <input type="number" id="jumlah" name="jumlah" required
            class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <!-- Harga -->
    <div class="max-w-md">
        <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
        <input type="number" id="harga" name="harga" required
            class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <!-- Foto -->
    <div class="max-w-md">
        <label for="foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto Produk</label>
        <input type="file" id="foto" name="foto" accept="image/*"
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
    </div>

    <!-- Tanggal Kadaluarsa -->
    <div class="max-w-md">
        <label for="tanggal_kadaluarsa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Kadaluarsa</label>
        <input type="date" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" required
            class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <!-- Submit -->
    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Simpan Produk
    </button>
</form>
@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        });
    });
</script>
@endif

    </section>
</div>
@endsection