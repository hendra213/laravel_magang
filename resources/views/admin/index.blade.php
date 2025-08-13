@extends('template.admin')

@section('title', 'Data Produk')

@section('content')
    <div class="p-4 md:ml-64">
        {{-- ganti bg-white menjadi bg-gray-100 agar card putihnya menonjol --}}
        <section class="px-4 py-8 antialiased md:py-16">
            <div class="mx-auto max-w-screen-xl">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach ($produks as $produk)
                        <div class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition">
                            <img class="rounded-t-lg w-full h-48 object-cover"
                                src="{{ asset('storage/foto_produk/' . $produk->foto) }}" alt="{{ $produk->nama }}" />
                            <div class="p-5">
                                <h5 class="mb-2 text-xl font-bold text-gray-900">{{ $produk->nama }}</h5>
                                <p class="text-sm text-gray-700 line-clamp-2">
                                    {{ $produk->deskripsi }}
                                </p>
                                <button data-modal-target="modal-detail-{{ $produk->id }}"
                                    data-modal-toggle="modal-detail-{{ $produk->id }}"
                                    class="mt-4 inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    Lihat Detail
                                </button>
                            </div>
                        </div>

                        {{-- Modal Detail --}}
                        <div id="modal-detail-{{ $produk->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto h-modal h-full bg-black bg-opacity-50">
                            <div class="relative w-full max-w-md max-h-full mx-auto mt-20">
                                <div class="relative bg-white rounded-lg shadow">
                                    {{-- Header Modal --}}
                                    <div class="flex items-start justify-between p-4 border-b rounded-t">
                                        <h3 class="text-xl font-semibold text-gray-900">
                                            Detail Produk
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                            data-modal-hide="modal-detail-{{ $produk->id }}">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414
                                1.414L11.414 10l4.293 4.293a1 1 0 01-1.414
                                1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586
                                10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>

                                    {{-- Isi Modal --}}
                                    <div class="p-6 space-y-4">
                                        <img src="{{ asset('storage/foto_produk/' . $produk->foto) }}"
                                            class="w-full h-48 object-cover rounded" alt="{{ $produk->nama }}">

                                        <div class="space-y-2">
                                            <h4 class="text-lg font-bold text-gray-900">{{ $produk->nama }}</h4>
                                            <p class="text-sm text-gray-700">{{ $produk->deskripsi }}</p>

                                            <div class="pt-3 border-t border-gray-200 space-y-1 text-sm">
                                                <p><span class="font-medium text-gray-900">Jumlah:</span>
                                                    {{ $produk->jumlah }}</p>
                                                <p><span class="font-medium text-gray-900">Harga:</span> Rp
                                                    {{ number_format($produk->harga, 0, ',', '.') }}</p>
                                                <p><span class="font-medium text-gray-900">Kadaluarsa:</span>
                                                    {{ \Carbon\Carbon::parse($produk->tanggal_kadaluarsa)->format('d M Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Footer Modal --}}
                                    <div class="flex justify-end p-4 border-t">
                                        <button type="button" data-modal-hide="modal-detail-{{ $produk->id }}"
                                            class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
                                            Tutup
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
