<?php

namespace App\Http\Controllers;

use App\Models\Item;
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
            'image' => [ 'required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);
        $image = $request->file('image');
        $imagePath = $image->store('items', 'public'); 
        
        $item = Item::create([
            'name' => $request->name,
            'image' => basename($imagePath), 
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
            'deleted_by' => Auth::id(),
        ]);

        return redirect()->route('admin.data')->with('success', 'Item berhasil ditambahkan');
    }

    public function show()
    {
        $items = Item::latest()->simplePaginate(5);
        return view('admin.data', compact('items'));
    }
}
