<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $barangTerbanyak = Pengajuan::select('item_id', DB::raw('count(*) as total'))
            ->where('status', 'selesai')
            ->with('item')
            ->groupBy('item_id')
            ->orderBy('total')
            ->limit(5)
            ->get();

        return view('admin.detail_barang', compact('barangTerbanyak'));
    }
}
