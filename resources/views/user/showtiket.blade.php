<x-layout heading="Detail Tiket">
    <div class="max-w-4xl mx-auto bg-white/10 rounded-lg shadow-md overflow-hidden mb-6">
        <!-- Header Section -->
        <div class="p-6 border-b border-dashed border-gray-300">
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <p class="text-xs text-gray-500">Nama User:</p>
                    <p class="font-bold"> {{ $pengajuan->user->name }}</p>
                </div>
                <div class="text-left">
                    <p class="text-xs text-gray-500">Deskripsi Kerusakan</p>
                    <p class="font-bold text-xl text-blue-500">{{ $pengajuan->deskripsi }}</p>
                </div>
                <div class="text-center">
                    <p class="text-xs text-gray-500">Nama Barang</p>
                    <p class="font-bold text-xl text-blue-500">{{ $pengajuan->item->name }}</p>
                </div>
            </div>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <p class="text-xs text-gray-500">KODE PENGAJUAN:</p>
                    <p class="font-bold"> {{ $pengajuan->kode_pengajuan }}</p>
                </div>
                <div class="text-center">
                    <p class="text-xs text-gray-500">Status</p>
                    <p class="font-bold text-xl text-blue-500">{{ $pengajuan->status }}</p>
                </div>
                <div class="text-center">
                    <p class="text-xs text-gray-500">Di Buat</p>
                    <p class="font-bold text-xl text-blue-500">{{ $pengajuan->created_at->translatedFormat('l, d F Y') }}</p>
                    {{-- {{ $pengajuan->created_at->diffForHumans() }} {{ $pengajuan->updated_at->format('d-m-Y') }} --}}
                </div>
            </div>
        </div>
    </div>
</x-layout>