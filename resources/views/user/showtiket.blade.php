<x-layout heading="Detail Tiket">
    {{-- @dd($pengajuan); --}}
    <div class="card mb-3">
        <div class="card-body">
            <p class="card-text">{{ $pengajuan->deskripsi }}</p>
            <p class="card-text">{{ $pengajuan->status }}</p>
            <p class="card-text">{{ $pengajuan->kode_pengajuan }}</p>
            <p class="card-text">{{ $pengajuan->created_at }}</p>
            <p class="card-text">{{ $pengajuan->created_at != $pengajuan->updated_at ?  $pengajuan->updated_at : null}}</p>
        </div>
    </div>
</x-layout>