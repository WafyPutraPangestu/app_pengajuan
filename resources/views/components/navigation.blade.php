  <div class="px-10">
    <nav class="flex justify-between items-center  py-4 border-b border-white/10"> 
        <div>
            <a href="">
                {{-- <img src="{{ vite::asset('resources/img/logo.svg') }}" alt=""> --}}
                <h1>logo</h1>
            </a>
        </div>
        <div class="space-x-6 font-bold pl-30">
          <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
          @can('admin')
          <x-nav-link href="{{ route('admin.input') }}" :active="request()->is('admin/input')">input Item</x-nav-link>
          <x-nav-link href="{{ route('admin.data') }}" :active="request()->is('admin/data')">Data Items</x-nav-link>
          <x-nav-link href="{{ route('admin.pengajuan') }}" :active="request()->is('admin/pengajuan')">Daftar Pengajuan</x-nav-link>
          <x-nav-link href="#">History</x-nav-link>
          @endcan
            {{-- admin fitur --}}
            {{-- user fitur --}}
            @can('user')
            <x-nav-link href="{{ route('user.pengajuan') }}" :active="request()->is('user/pengajuan')">Pengajuan Perbaikan</x-nav-link>
            <x-nav-link href="{{ route('user.tiket') }}" :active="request()->is('user/tiket')">Ticket</x-nav-link>
            <x-nav-link href="{{ route('user.riwayat') }}" :active="request()->is('user/riwayat')">Riwayat Perbaikan</x-nav-link>
            @endcan
        </div>
        <div class="flex justify-between gap-4"> 
           {{-- <x-button-primary>
            <a href="">Post a Job</a>
          </x-button-primary> --}}
          @auth
          <form method="POST" action="{{ route('auth.logout') }}">
            @csrf
            <x-button-outline class="cursor-pointer" type="submit">Logout</x-button-outline>
          </form>
          @endauth
        </div>
        @guest
        <div class="space-x-6 font-bold">
          <x-button-outline href="{{ route('auth.register') }}">Mendaftar</x-button-outline>
          <x-button-outline href="{{ route('auth.login') }}">Login</x-button-outline>
      </div>
        @endguest
    </nav>

    <main class="mt-10 max-w-[986px] mx-auto">
      {{ $slot }}
    </main>

  </div>
