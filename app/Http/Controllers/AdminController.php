<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function input()
    {
        return view('admin.input');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string'],
            'image' => [ 'required', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
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
        $pengajuan = Pengajuan::with(['item'])->latest()->simplePaginate(5);
        return view('admin.pengajuan', compact('pengajuan'));
    }
    public function pengajuan(Request $request, Pengajuan $pengajuan)
    {
        // dd($request->all());

        $validasi = $request->validate([
            'status' => 'required|in:pending,proses,selesai',
            
        ]);
        $pengajuan->status = $validasi['status'];
        $pengajuan->save();


        return redirect()->route('admin.pengajuan')->with('success', 'Pengajuan berhasil disetujui');
    }
}
