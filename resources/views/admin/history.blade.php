<x-layout heading="HISTORY DATA">
<div class="">
    @foreach ($pengajuan as $item)
    <div class=" ">
        <div>
            <h1 class="text-lg font-bold">{{ $item->nama }}</h1>
            <p class="text-sm">{{ $item->deskripsi }}</p>
            <p>{{ $item->kode_pengajuan }}</p>      
            <p>{{ $item->created_at != $item->updated_at ?  $item->updated_at : null}}</p>        
        </div>        
        <div class="border-b border-pink-50/25"></div>
    @endforeach
</div>


<h1 class="mt-10">
    <p>1. membuat berapa banyak pengajuan barang yang di buat oleh user selama 1 minggu</p> 
    <p>2. barang apa saja yang sering sekali di perbaiki </p>
    <p>3. user yang sering sekali mengajukan barang perbaikan</p>
    <p></p>
    <p></p>
</h1>
</x-layout>