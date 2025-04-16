<x-layout heading="Dashboard">
    <div class="container mx-auto p-4 space-y-8">
        <!-- Bagian Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Total Pengajuan -->
            <div class="bg-white/10 rounded-lg shadow p-6">
                <h3 class="text-sm font-medium text-gray-500 mb-2">Total Pengajuan (Selesai)</h3>
                <p class="text-3xl font-bold text-blue-600">
                    {{ $pengajuanSelesai }}
                </p>
            </div>
            {{-- @dd($pengajuanPertahun) --}}
            {{-- <div class="">
                <h3 class="text-sm font-medium text-gray-500 mb-2"></h3>
                <p class="text-3xl font-bold text-blue-600">
                    {{ $starYears}}
                </p>
                <p class="text-sm font-medium text-gray-500 mb-2"></p>
                <p class="text-3xl font-bold text-blue-600">
                    {{ $endYears }}
                </p>
                <p class="text-sm font-medium text-gray-500 mb-2"></p>   
                <p class="text-3xl font-bold text-blue-600">
                    {{ $startDate->format('d-m-Y') }}
                </p>
                <p class="text-sm font-medium text-gray-500 mb-2"></p>
                <p class="text-3xl font-bold text-blue-600">
                    {{ $endDate->format('d-m-Y') }}
                </p>
                {{-- @foreach ($pengajuanPertahun as $items )
                {{$offset + 1 }}
                    
                @endforeach --}}
                @foreach ($periodeResults as $periode)
                <div class="periode-box">
                    <h2>Periode: {{ $periode['periode'] }}</h2>
                    @if($periode['data']->isEmpty())
                        <p>Tidak ada data untuk periode ini.</p>
                    @else
                        <ul>
                            @foreach ($periode['data'] as $pengajuan)
                                <li>
                                    {{-- Ubah 'title' dengan field yang sesuai dari model Pengajuan --}}
                                    <strong>{{ $pengajuan->title ?? 'Judul pengajuan' }}</strong>
                                    <br>
                                    Dibuat pada: {{ $pengajuan->created_at->format('d-m-Y') }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endforeach
                
            </div>
    
            <!-- Barang Sering Diperbaiki -->
            <div class="bg-white/10 rounded-lg shadow p-6">
               <h3 class="text-sm font-medium text-gray-500 mb-2">Barang Sering Diperbaiki</h3>
               <a href="{{ route("detail_barang") }}"><p class="text-3xl font-bold text-green-600">
                    {{ $barangTerbanyak->count() }}
                </p></a>
            </div>
    
            <!-- User Aktif -->
            <div class="bg-white/10 rounded-lg shadow p-6">
                <h3 class="text-sm font-medium text-gray-500 mb-2">User Aktif Melakukan Perbaikan</h3>
                <p class="text-3xl font-bold text-purple-600">
                    {{ $userTerbanyak->count() }}
                </p>
            </div>
        </div>
        <!-- Tabel Detail -->
        {{-- <div class="bg-white/10 rounded-lg shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Detail</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jumlah</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <!-- User -->
                    @foreach ($userTerbanyak as $user)
                    <tr>
                        <td class="px-6 py-4">User</td>
                        <td class="px-6 py-4">{{ $user->user->name }}</td>
                        <td class="px-6 py-4">{{ $user->total }}</td>
                    
                    </tr>
                    @endforeach
                     <!-- Total Pengajuan -->
                     <tr>
                        <td class="px-6 py-4">Total Pengajuan</td>
                        <td class="px-6 py-4">Dalam 2 Tahun</td>
                        <td class="px-6 py-4 font-medium">{{ $pengajuanPertahun }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> --}}
       
    </x-layout>