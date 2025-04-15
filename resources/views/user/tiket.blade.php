<x-layout heading="Hallo {{ $user->name }}">
    <div class="container mx-auto p-4">
        <div class=" rounded-lg shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50/10">
                    @if ($pengajuan->isEmpty())
                    <tr>
                        <th colspan="6" class="border border-white/10 px-4 py-2 text-center text-white">Tidak ada tiket</th>
                    </tr> 
                    @else
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                    @endif
                </thead>
                <tbody class="">
                    @foreach ($pengajuan as $item)
                    <tr class="border-b border-white/10">
                        <td class="px-4 py-6 whitespace-nowrap text-left uppercase">
                            <p class="">{{ $item->item->name }}</p>
                        </td>
                        <td class="px-4 py-6 whitespace-nowrap text-right">
                            <a href="{{ route('user.showtiket', $item->id) }}">
                                SHOW TIKET
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    

        <div class="mt-6">
            {{ $pengajuan->links() }}
        </div>
    </div>
    </x-layout>