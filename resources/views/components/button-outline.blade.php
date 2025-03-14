@props(['href' => null])

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'inline-flex items-center px-6 py-2 bg-transparent border border-white rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-white hover:text-pink-600 active:bg-white active:text-pink-700 focus:outline-none focus:border-white focus:ring ring-pink-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-6 py-2 bg-transparent border border-white rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-white hover:text-pink-600 active:bg-white active:text-pink-700 focus:outline-none focus:border-white focus:ring ring-pink-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </button>
@endif