@extends('template.admin')

@section('title', 'Daftar Produk')

@include('admin.kelola-berita.add')
@include('admin.kelola-berita.edit')
@include('admin.kelola-berita.delete')

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

            <button data-modal-target="modalAdd" data-modal-toggle="modalAdd"
                class="ml-auto text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-4 py-2">
                + Tambah Produk
            </button>
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
                        <tr data-id="{{ $produk->id }}"
                            data-nama="{{ $produk->nama }}"
                            data-jumlah="{{ $produk->jumlah }}"
                            data-harga="{{ $produk->harga }}"
                            data-foto="{{ $produk->foto }}"
                            data-tanggal="{{ \Carbon\Carbon::parse($produk->tanggal_kadaluarsa)->format('Y-m-d') }}"
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
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($produk->tanggal_kadaluarsa)->format('Y-m-d') }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <button data-modal-target="modalEdit" data-modal-toggle="modalEdit" class="text-blue-600 hover:underline editBtn">Edit</button>
                                <button data-modal-target="modalDelete" data-modal-toggle="modalDelete" class="text-red-600 hover:text-red-800 font-medium deleteBtn">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>

@push('scripts')
<script>
$(function () {

    // Tambah Produk
    $('#formAdd').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            url: '/api/create-product',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function() {
                Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Produk ditambahkan',
                timer: 2000, // tutup otomatis 2 detik
                showConfirmButton: false
            }).then(() => location.reload());
        
            }
        });
    });

    // Edit Produk (isi form dari tabel)
    $('.editBtn').click(function () {
        let tr = $(this).closest('tr');
        $('#editId').val(tr.data('id'));
        $('#editNama').val(tr.data('nama'));
        $('#editJumlah').val(tr.data('jumlah'));
        $('#editHarga').val(tr.data('harga'));
        $('#editTanggal').val(tr.data('tanggal'));
        if (tr.data('foto')) {
            $('#previewFoto').attr('src', '/storage/foto_produk/' + tr.data('foto')).show();
        } else {
            $('#previewFoto').hide();
        }
    });

    // Submit Edit
    $('#formEdit').submit(function(e) {
        e.preventDefault();
        let id = $('#editId').val();
        let formData = new FormData(this);
        formData.append('_method', 'PUT');
        $.ajax({
            url: '/api/update-product/' + id,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Produk diperbarui',
                timer: 2000,
                showConfirmButton: false
            }).then(() => location.reload());
        }
        });
    });

    // Delete Produk (ambil ID)
    $('.deleteBtn').click(function () {
        let id = $(this).closest('tr').data('id');
        $('#deleteId').val(id);
    });

    // Submit Delete
    $('#formDelete').submit(function(e) {
        e.preventDefault();
        let id = $('#deleteId').val();
        $.ajax({
            url: '/api/delete-product/' + id,
            method: 'POST',
            data: {_method: 'DELETE', _token: '{{ csrf_token() }}'},
            success: function () {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Produk dihapus',
                timer: 2000,
                showConfirmButton: false
            }).then(() => location.reload());
        }
        });
    });

});
</script>
@endpush

@endsection