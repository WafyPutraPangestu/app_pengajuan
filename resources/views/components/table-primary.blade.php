<div class="bg-white/5 rounded-xl flex flex-col gap-4 text-center hover:bg-white/10 transition-colors duration-300 border pb-4">
    <div class="">
        <img src="{{ asset('storage/items/' . $image) }}" alt="{{ $name }}" class="w-full rounded-t-xl object-cover h-72">
    </div>
    <div class=" text-lg text-center font-semibold">
        <h1>{{ $name }}</h1>
    </div>
</div>
