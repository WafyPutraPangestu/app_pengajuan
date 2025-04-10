<x-layout heading="Riwayat Perbaikan">
    <div class="">
    @foreach ($pengajuan as $item)
    <p>{{ $item->id }}</p>
    <p>{{ $item->deskripsi }}</p>
    <p>{{ $item->kode_pengajuan }}</p>
    <p>{{ $item->created_at }}</p>
    <p>{{ $item->created_at != $item->updated_at ?  $item->updated_at : null}}</p>
    <div class="border-b-1"></div>
    @endforeach
    </div>
<div class="">
    {{ $pengajuan->links() }}
</div>
</x-layout>