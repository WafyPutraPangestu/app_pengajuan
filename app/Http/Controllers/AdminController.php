<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Pengajuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard(request $request)
    {
        $duaTahun = now()->subYears(2)->format("y");
        $pengajuanDuaTahun = Pengajuan::where('status', 'selesai')
            ->where('created_at', '>=', $duaTahun)
            ->with(['item', 'user'])
            ->orderBy('created_at', 'desc')
            ->get();



        $pengajuanSelesai = Pengajuan::where(function ($query) {
            $query->where('status', 'selesai');
        })
            ->select(DB::raw('YEAR(created_at) as year'), DB::raw('count(*) as total'))
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->count();

        $barangTerbanyak = Pengajuan::select('item_id', DB::raw('count(*) as total'))
            ->where('status', 'selesai')
            ->with('item')
            ->groupBy('item_id')
            ->orderBy('total')
            ->limit(5)
            ->get();

        $userTerbanyak = Pengajuan::select('user_id', DB::raw('count(*) as total'))
            ->with('user')
            ->groupBy('user_id')
            ->orderBy('total')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('pengajuanSelesai', 'barangTerbanyak', 'userTerbanyak', 'pengajuanDuaTahun', 'duaTahun', 'pengajuanSelesai'));
    }
    public function input()
    {
        return view('admin.input');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
        ]);
        $image = $request->file('image');
        $imagePath = $image->store('items', 'public');

        $item = Item::create([
            'name' => $request->name,
            'image' => basename($imagePath),
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),

        ]);

        return redirect()->route('admin.data')->with('success', 'Item berhasil ditambahkan');
    }

    public function show()
    {
        $items = Item::latest()->simplePaginate(5);
        return view('admin.data', compact('items'));
    }

    public function viewPengajuan()
    {
        $pengajuanSelesai = Pengajuan::with(['item'])
            ->where('status', 'pending')

            ->latest()->simplePaginate(3);

        $pengajuanHistory = Pengajuan::with(['item'])
            ->where('status', 'selesai')
            ->latest('updated_at')->simplePaginate(3);
        return view('admin.pengajuan', compact('pengajuanSelesai', 'pengajuanHistory'));
    }
    public function pengajuan(Request $request, Pengajuan $pengajuan)
    {
        // dd($request->all());


        $validasi = $request->validate([
            'status' => 'required|in:pending,proses,selesai',

        ]);
        $pengajuan->status = $validasi['status'];

        if ($validasi['status'] === 'selesai') {
            $pengajuan->updated_at = now();
        } else {
            $pengajuan->updated_at = null;
        }
        $pengajuan->save();


        return redirect()->route('admin.pengajuan')->with('success', 'Pengajuan berhasil disetujui');
    }

    public function viewHistory()
    {
        $pengajuan = Pengajuan::with(['item'])->where('status', 'selesai')->latest()->simplePaginate(5);
        return view('admin.history', compact('pengajuan'));
    }
}
