<x-layout heading="Hallo {{ $user->name }}">
<div class="">
    @foreach ($pengajuan as $item)
    <div class="card mb-3">
        <div class="card-body">
            <p class="card-text">{{ $item->deskripsi }}</p>
            <a href="{{ route('user.showtiket', $item->id) }}" class="btn btn-primary">Detail</a>
        </div>        
    @endforeach
</div>
</x-layout>