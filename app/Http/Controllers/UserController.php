<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function viewPengajuan()
    {
        $user = Auth::user(); 
        $items = Item::all(); 
        // dd(Auth::user());
        return view('user.pengajuan', compact('user', 'items'));
    }
    

    public function pengajuan(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'item_id' => 'required',
            'deskripsi' => 'required',
        ]);

        Pengajuan::create([
            'user_id' => Auth::id(),
            'item_id' => $request->item_id,
            'deskripsi' => $request->deskripsi,
            'kode_pengajuan' => 'P' . time(),
            'status' => 'pending',
        ]);
        
        return redirect()->route('user.pengajuan')->with('success', 'Pengajuan berhasil disimpan');
    }

    public function ViewTiket()
    {
        $user = Auth::user();
        $pengajuan = pengajuan::where('user_id',$user->id)->latest()->simplePaginate(2);
        

        return view('user.tiket', compact('user','pengajuan'));
    }

    public function ShowTiket(Pengajuan $pengajuan)
    {
        return view('user.showtiket', compact('pengajuan'));
    }

    public function ShowRiwayat()
    {
        $user = Auth::user();
        $pengajuan = Pengajuan::where('status', 'selesai')->where('user_id',$user->id)->latest()->simplePaginate(2);
        return view('user.history', compact('user', 'pengajuan'));
    }
}
