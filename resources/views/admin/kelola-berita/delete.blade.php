<div id="modalDelete" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50  items-center justify-center">
    <div class="relative w-full max-w-md p-4">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="p-4 text-center">
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                    Apakah Anda yakin ingin menghapus produk ini?
                </h3>
                <form id="formDelete" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" id="deleteId">
                    <button type="button" data-modal-hide="modalDelete" class="px-4 py-2 bg-gray-300 rounded-lg">Batal</button>
                    <button type="submit" class="ml-2 px-4 py-2 bg-red-600 text-white rounded-lg">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>