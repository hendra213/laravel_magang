@extends('template.admin')

@section('title', 'Daftar Produk')

@section('content')

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Oke'
            });
        </script>
    @endif


    <div class="p-4 md:ml-64">
        <section class="bg-white px-4 py-8 antialiased dark:bg-gray-900 md:py-16 mt-16">
            {{-- Header dan Tombol --}}
            <div class="flex justify-between mb-4">
                <input type="text" id="tableSearch"
                    class="w-full max-w-xs px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                    placeholder="Cari produk...">

                <a href="{{ route('form.addberita') }}"
                    class="ml-auto text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-4 py-2">
                    + Tambah Produk
                </a>
            </div>

            {{-- Tabel Produk --}}
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-center text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                        <tr>
                            <th class="px-6 py-3">Nama Produk</th>
                            <th class="px-6 py-3">Jumlah</th>
                            <th class="px-6 py-3">Harga</th>
                            <th class="px-6 py-3">Foto</th>
                            <th class="px-6 py-3">Kadaluarsa</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($produks as $produk)
                            <tr
                                class="border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">{{ $produk->nama }}</td>
                                <td class="px-6 py-4">{{ $produk->jumlah }}</td>
                                <td class="px-6 py-4">Rp{{ number_format($produk->harga, 0, ',', '.') }}</td>
                                <td class="px-6 py-4">
                                    @if ($produk->foto)
                                        <img src="{{ asset('storage/foto_produk/' . $produk->foto) }}"
                                            class="w-16 h-16 object-cover rounded mx-auto">
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($produk->tanggal_kadaluarsa)->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 space-x-2">
                                    {{-- Tombol Edit --}}
                                    <button data-modal-target="editModal-{{ $produk->id }}"
                                        data-modal-toggle="editModal-{{ $produk->id }}"
                                        class="text-blue-600 hover:underline">
                                        Edit
                                    </button>

                                    {{-- Tombol Hapus --}}
                                    <button onclick="confirmDelete({{ $produk->id }})"
                                        class="text-red-600 hover:text-red-800 font-medium">
                                        Hapus
                                    </button>

                                    <form id="delete-form-{{ $produk->id }}"
                                        action="{{ route('berita.destroy', $produk->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>

                            {{-- Modal Edit --}}
                            @include('admin.kelola-berita.edit', ['produk' => $produk])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Pencarian Tabel --}}
    <script>
        $(document).ready(function() {
            $('#tableSearch').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('#tableBody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

    {{-- Konfirmasi Hapus --}}
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Data akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                customClass: {
                    confirmButton: 'bg-red-600 hover:bg-red-700 text-white font-medium px-4 py-2 rounded mr-2',
                    cancelButton: 'bg-gray-300 hover:bg-gray-400 text-black font-medium px-4 py-2 rounded'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endpush
