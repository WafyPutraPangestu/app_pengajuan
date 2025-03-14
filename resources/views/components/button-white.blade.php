@props(['href' => null])

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'inline-flex items-center px-6 py-3 bg-white border border-transparent rounded-md font-semibold text-sm text-pink-600 uppercase tracking-widest hover:bg-gray-50 active:bg-gray-100 focus:outline-none focus:border-gray-100 focus:ring ring-pink-100 disabled:opacity-25 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-6 py-3 bg-white border border-transparent rounded-md font-semibold text-sm text-pink-600 uppercase tracking-widest hover:bg-gray-50 active:bg-gray-100 focus:outline-none focus:border-gray-100 focus:ring ring-pink-100 disabled:opacity-25 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </button>
@endif