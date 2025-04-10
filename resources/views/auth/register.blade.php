<x-layout heading="Pendaftaran Akun" class="bg-gray-100">
    <h1 class="text-2xl font-extrabold text-center py-4"> PENDAFTARAN AKUN</h1>
    <x-form method="POST" action="{{ route('auth.register') }}">
        <x-input name="name" value="{{ old('name') }}" label="Nama Lengkap" />
        <x-input name="no_telp"  value="{{ old('no_telp') }}" label="Nomor Handphone" />
        <x-input name="email" vlaue="{{ old('email') }}" label="Email" />
        <x-input name="password" label="Password" type="password" />
        <x-input name="password_confirmation" label="Konfirmasi Password" type="password" />
        <div class="flex justify-end text-blue-500 underline">
            <a class="text-sm" href="{{ route('auth.login') }}">Sudah Mmempunyai Akun</a>
        </div>
        <div class="flex justify-between items-center pt-4">
            <x-button-outline type="submit" class="cursor-pointer">Mendaftar</x-button-outline>
            <x-button-outline href="/">Batal</x-button-outline>

        </div>
    </x-form>

    
</x-layout>