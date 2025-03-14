<div class="bg-white/5 p-4 rounded-xl flex flex-col gap-y-4 text-center">
    <div class="self-start text-sm">
        <h1>{{ $name }}</h1>
    </div>
    <div class="py-8">
        <img src="{{ asset('storage/items/' . $image) }}" alt="{{ $name }}" class="mx-auto">
    </div>
</div>
