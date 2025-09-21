<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail Aset Barang
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-gray-700 dark:text-gray-300">

                    {{-- Detail Informasi --}}
                    <div class="space-y-4">
                        <h3
                            class="text-xl font-semibold text-gray-900 dark:text-white border-b pb-2 mb-4 dark:border-gray-700">
                            Data Barang</h3>
                        <p><strong>Nama Barang:</strong> (Nama Barang Placeholder)</p>
                        <p><strong>Merk:</strong> (Merk Placeholder)</p>
                        <p><strong>Ruangan:</strong> (Kode Ruangan Placeholder)</p>
                        <p><strong>Tanggal Beli:</strong> (Tanggal Pembelian Placeholder)</p>
                        <p><strong>Kondisi:</strong> <span class="font-bold text-indigo-500">(Kondisi
                                Placeholder)</span></p>
                    </div>

                    {{-- Aksi Cepat (Hanya untuk Admin) --}}
                    <div class="space-y-4 pt-4 md:pt-0">
                        <img src="https://thumbs.dreamstime.com/b/example-red-d-square-button-white-background-85983502.jpg"
                            class="w-full" alt="">
                    </div>
                </div>
                <div class="space-y-4 pt-4 md:pt-0">

                    <div class="border-b pb-2 mb-4 dark:border-gray-700"></div>
                    <form action="{{route('barang.destroy', $data->id)}}" method="post" class="py-6">
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="return confirm('Yakin mau dihapus?')"
                            class="rounded-md bg-red-500 px-2.5 py-1.5 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-white/20">Hapus</button>
                        <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'show-edit')"
                            class="rounded-md bg-yellow-500 px-2.5 py-1.5 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-white/20">Edit</button>
                    </form>

                </div>

            </div>
        </div>
    </div>

    {{-- Modal Update Data Barang (Hanya jika admin) --}}
    @if (auth()->user() && auth()->user()->isAdmin)
        <dialog id="updateBarangModal" class="p-0 backdrop:bg-black/50 rounded-lg shadow-2xl dark:bg-gray-900">
            <div class="p-6 w-[400px]">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 border-b pb-2 dark:border-gray-700">Edit
                    Barang: (Nama Barang Placeholder)</h3>
                <form method="POST" action="#">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        {{-- Ulangi input dari Modal Create, dengan value diisi dari $barang->field --}}
                        <div>
                            <x-input-label for="nama_barang_u" value="Nama Barang" />
                            <x-text-input id="nama_barang_u" name="nama_barang" type="text" class="mt-1 block w-full"
                                value="(Nama Barang Placeholder)" required />
                        </div>
                        {{-- ... input lainnya ... --}}
                    </div>

                    <div class="mt-6 flex justify-end gap-3">
                        <button type="button" onclick="document.getElementById('updateBarangModal').close()"
                            class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                            Batal
                        </button>
                        <x-primary-button class="ml-3 bg-green-600 hover:bg-green-700">
                            Update Data
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </dialog>
    @endif
</x-app-layout>