@props(['href' => null])

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-pink-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-pink-700 active:bg-pink-800 focus:outline-none focus:border-pink-800 focus:ring ring-pink-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-pink-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-pink-700 active:bg-pink-800 focus:outline-none focus:border-pink-800 focus:ring ring-pink-300 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer']) }}>
        {{ $slot }}
    </button>
@endif


