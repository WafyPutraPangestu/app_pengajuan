<div class="bg-white/5 p-4 rounded-xl flex flex-col gap-y-4 text-center hover:bg-white/10 transition-colors duration-300 border">
    <div class="self-start text-lg">
        <h1>{{ $name }}</h1>
    </div>
    <div class="">
        <img src="{{ asset('storage/items/' . $image) }}" alt="{{ $name }}" class="mx-auto h-50 w-80 object-none rounded-2xl">
    </div>
</div>
