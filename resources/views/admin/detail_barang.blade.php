<x-layout heading="Detail Barang">
   <div class="bg-white/10 rounded-lg shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Barang</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jumlah</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <!-- User -->
                    @foreach ($barangTerbanyak as $barang)
                    <tr>
                        <td class="px-6 py-4">Barang</td>
                        <td class="px-6 py-4">{{ $barang->item->name }}</td>
                        <td class="px-6 py-4">2</td>
                    </tr>
                    @endforeach 

                </tbody>
            </table>
        </div>
    </div>
</x-layout>