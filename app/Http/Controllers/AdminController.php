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
        $offset = $request->get('periode_offset', 0);
        $year = Carbon::now()->year + ($offset * 2);
        $starYears = $year - ($year % 2);
        $endYears = $year + 1;
        $startDate = Carbon::createFromFormat('Y-m-d', "$starYears-01-01");
        $endDate = Carbon::createFromFormat('Y-m-d', "$endYears-12-31");
        $pengajuanPertahun = pengajuan::whereBetween("created_at", [$startDate, $endDate])->get();



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

        return view('admin.dashboard', compact('pengajuanSelesai', 'barangTerbanyak', 'userTerbanyak', 'startDate', 'endDate', 'offset', 'year', 'starYears', 'endYears', 'pengajuanPertahun'));
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
        $pengajuan = Pengajuan::with(['item'])->where('status', '!=', 'selesai')
            ->orWhere(function ($query) {
                $query->where('status', 'selesai')
                    ->where('updated_at', '>=', now()->subMinute(1));
            })
            ->latest()->simplePaginate(3);
        return view('admin.pengajuan', compact('pengajuan'));
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
