<x-layout heading="HALLO {{ $user->name }}">
    <x-form method="POST" action="{{ route('user.pengajuan') }}">
        @csrf
       
        <div class="space-y-4">
            @if ($items->isEmpty())
            <tr>
                <td colspan="6" class="border border-white/10 px-4 py-2 text-center text-white">Tidak ada barang yang bisa di perbaiki</td>
            </tr>  
            @else
            <div class="font-medium">Pilih Barang</div>
            @endif
            <div class="grid grid-cols-3 gap-4">
                @foreach ($items as $item)
                    <label class="border p-4 rounded-lg cursor-pointer hover:bg-white/25 transition-colors">
                        <input type="radio" name="item_id" value="{{ $item->id }}" class="hidden peer">
                        <div class="peer-checked:border-blue-500 peer-checked:border-2 h-full">
                            <div class="flex flex-col items-center">
                                <img 
                            src="{{ asset('storage/items/' . $item->image) }}" alt="{{ $item->name }}"
                                class="w-full h-32 object-cover mb-2 rounded">
                                <span class="text-center font-medium">{{ $item->name }}</span>
                            </div>
                        </div>
                    </label>
                @endforeach
            </div>
            @error('item_id')
            <div class="text-red-500 text-lg">{{ $message }}</div> 
        @enderror
            <x-input name="deskripsi" label="Deskripsi" type="textarea" rows="3" />
            <div class="flex justify-between items-center pt-4">
                <x-button-outline type="submit">Kirim</x-button-outline>
                <x-button-outline href="/">Batal</x-button-outline>
            </div>
        </div>
    </x-form>
</x-layout>