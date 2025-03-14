<x-layout heading="halaman Input">
    <x-form method="POST" action="{{ route('admin.input') }}" enctype="multipart/form-data">
    @csrf
    <x-input label="Nama Barang" name="name" value="{{ old('name') }}" placeholder="Masukkan nama"/>
    <div class="">
        
    </div>
    <div id="previewContainer" class="hidden border p-1 w-xs max-w-fit h-xs max-h-fit">
        <img id="imagePreview" alt="Preview" />
    </div>
    <x-input label="Upload Gambar" type="file" name="image" id="imageInput" accept="image/*"/>
    <x-button-outline type="submit">Submit</x-button-outline>
</x-form>
</x-layout>