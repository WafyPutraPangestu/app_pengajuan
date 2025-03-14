<x-layout heading="Halaman Data Barang">
    <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-4">
        @foreach ($items as $item)
        <x-table-primary :name="$item->name" :image="$item->image" />
    @endforeach

    </div>
<div class="">
    {{ $items->links() }}
</div>
</x-layout>