<x-layout>
   
  
    <h1 class="text-2xl font-extrabold text-center py-4">WELCOME TO LOGIN PAGE</h1>
    <x-form method="POST" action="{{ route('auth.login') }}">
      
        <x-input name="email"  label="Email" />
        <x-input name="password" label="Password" type="password" />
        <div class="flex justify-end text-blue-500 underline">
            <a class="text-sm" href="{{ route('auth.register') }}">Belum Mempunyai Akun</a>
        </div>
        <div class="flex justify-between items-center pt-4">
            <x-button-outline type="submit" class="cursor-pointer">Masuk</x-button-outline>
            <x-button-outline href="/">Batal</x-button-outline>
        </div>
    </x-form>
</x-layout>