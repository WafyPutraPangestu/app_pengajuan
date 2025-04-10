<nav class="flex justify-between items-center border-b border-white/10 px-10 py-2">
  <div>
      <a href="/">
          <h1>logo</h1>
      </a>
  </div>
  <div class="flex items-center gap-8">
      <div class="space-x-6 font-bold">
          <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
          @can('admin')
          <x-nav-link href="{{ route('admin.dashboard')}}"  :active="request()->is('admin/dashboard')">Dashboard</x-nav-link>
          <x-nav-link href="{{ route('admin.pengajuan') }}"  :active="request()->is('admin/pengajuan')">Daftar Pengajuan</x-nav-link>
          <x-nav-link href="{{ route('admin.input') }}" :active="request()->is('admin/input')">Input Item</x-nav-link>
          <x-nav-link href="{{ route('admin.data') }}"  :active="request()->is('admin/data')">Data Items</x-nav-link>
          <x-nav-link href="{{ route('admin.history') }}"  :active="request()->is('admin/history')">History</x-nav-link>
          @endcan
          @can('user')
          <x-nav-link href="{{ route('user.pengajuan') }}" :active="request()->is('user/pengajuan')">Pengajuan</x-nav-link>
          <x-nav-link href="{{ route('user.tiket') }}" :active="request()->is('user/tiket')">Ticket</x-nav-link>
          <x-nav-link href="{{ route('user.riwayat') }}" :active="request()->is('user/riwayat')">History</x-nav-link>
          @endcan
      </div>
      <div class="flex items-center gap-4">
          @auth
          <form method="POST" action="{{ route('auth.logout') }}">
              @csrf
              <button class="inline-flex items-center px-1   text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out cursor-pointer">
                  Logout
              </button>
          </form>
          @endauth
          @guest
          <x-button-outline href="{{ route('auth.register') }}">Mendaftar</x-button-outline>
          <x-button-outline href="{{ route('auth.login') }}">Login</x-button-outline>
          @endguest
      </div>
  </div>
</nav>