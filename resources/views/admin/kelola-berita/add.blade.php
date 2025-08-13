<div id="modalAdd" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center">
    <div class="relative w-full max-w-md p-4">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Tambah Produk</h3>
                <button type="button" data-modal-hide="modalAdd" class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5">✕</button>
            </div>
            <form id="formAdd" enctype="multipart/form-data">
                @csrf
                <div class="p-4 space-y-4">
                    <input type="text" name="nama" placeholder="Nama Produk" class="w-full border rounded-lg p-2">
                    <input type="number" name="jumlah" placeholder="Jumlah" class="w-full border rounded-lg p-2">
                    <input type="number" name="harga" placeholder="Harga" class="w-full border rounded-lg p-2">
                    <input type="file" name="foto" class="w-full border rounded-lg p-2">
                    <input type="date" name="tanggal_kadaluarsa" class="w-full border rounded-lg p-2">
                </div>
                <div class="flex items-center justify-end p-4 border-t border-gray-200 rounded-b">
                    <button type="button" data-modal-hide="modalAdd" class="px-4 py-2 bg-gray-300 rounded-lg">Batal</button>
                    <button type="submit" class="ml-2 px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>