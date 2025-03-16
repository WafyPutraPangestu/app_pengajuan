<x-layout heading="Hallo">

    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold">Daftar Pengajuan</h1>
        <a href="{{ route('admin.input') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Tambah Pengajuan</a>
    </div>
    <div class="mt-8">
        <table class="w-full border-collapse border border-white/10">
            <thead>
                <tr>
                    <th class="border border-white/10 px-4 py-2">No</th>
                    <th class="border border-white/10 px-4 py-2">Nama Barang</th>
                    <th class="border border-white/10 px-4 py-2">Image</th>
                    <th class="border border-white/10 px-4 py-2">Deskripsi</th>
                    <th class="border border-white/10 px-4 py-2">Kode Pengajuan</th>
                    <th class="border border-white/10 px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengajuan as $item)
                    <tr>
                        <td class="border border-white/10 px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border border-white/10 px-4 py-2">{{ $item->name }}</td>
                        <td class="border border-white/10 px-4 py-2">
                            <img src="{{ asset('storage/items/' . $item->item->image) }}" alt="{{ $item->name }}" class="w-20 h-20 object-cover">
                        </td>
                        <td class="border border-white/10 px-4 py-2">{{ $item->deskripsi }}</td>
                        <td class="border border-white/10 px-4 py-2">{{ $item->kode_pengajuan }}</td>
                        <td class="border border-white/10 px-4 py-2">
                            <div class="flex items-center gap-4">
                                <button onclick="toggleEditForm({{ $item->id }})" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Edit</button>
                            <form id="edit-form-{{ $item->id }}" method="POST" action="/admin/{{ $item->id }}/status" class="hidden mt-4">
                                @csrf
                                @method('PUT')
                                <div class="flex gap-2 items-center py-2">
                                    <select name="status" id="status-{{ $item->id }}" class="inline-flex items-center px-6 py-2 bg-transparent border border-white rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-white hover:text-pink-600 active:bg-white active:text-pink-700 focus:outline-none focus:border-white focus:ring ring-pink-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="proses" {{ $item->status == 'proses' ? 'selected' : '' }}>Proses</option>
                                        <option value="selesai" {{ $item->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                    <x-button-outline type="submit">Update</x-button-outline>
                                    <button type="button" onclick="toggleEditForm({{ $item->id }})" class="px-4 py-2 bg-gray-500 text-white rounded-lg">Cancel</button>
                                </div>
                            </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="">
            {{ $pengajuan->links() }}
        </div>
    </div>
    <script>
        function toggleEditForm(itemId) {
            const form = document.getElementById('edit-form-' + itemId);
            form.classList.toggle('hidden');
        }
    </script>
</x-layout>
