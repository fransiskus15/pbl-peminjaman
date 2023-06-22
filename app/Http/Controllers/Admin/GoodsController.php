<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Goods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GoodsController extends Controller
{
    public function index()
    {
        $goods = Goods::all();
        // return view('admin.goods.index', compact('goods'));
        return view('admin.goods.index', ['goods' => $goods]);
    }

    public function create()
    {
        return view('admin.goods.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'stock' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Goods::create($validator->validated());

        return redirect()->route('admin.goods.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $goods = Goods::find($id);
        if (!$goods) {
            return redirect()->route('admin.goods.index')->with([
                'notifikasi' => 'Data barang tidak ditemukan!',
                'type' => 'error'
            ]);
        }
        return view('admin.goods.edit', ['goods' => $goods]);
    }


    // public function edit(Goods $goods)
    // {
    //     return view('admin.goods.edit', compact('goods'));
    // }

    public function update(Request $request, Goods $goods)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'stock' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $goods->update($validator->validated());

        return redirect()->route('admin.goods.index')->with('success', 'Barang berhasil diperbarui!');
    }

    // public function destroy(Goods $goods)
    // {
    //     $goods->delete();

    //     return redirect()->route('admin.goods.index')->with('success', 'Barang berhasil dihapus!');
    // }

    public function destroy(Goods $goods)
    {
        $goods->delete();

        return redirect()->route('admin.goods.index')->with('success', 'barang berhasil dihapus');
    }
}
