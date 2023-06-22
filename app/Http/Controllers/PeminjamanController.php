<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Pengembalian;
use Validator;

class PeminjamanController extends Controller
{

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'email' => 'required|email',
        'nim' => 'required',
        'nomor_hp' => 'required',
        'jumlah' => 'required|integer|min:1',
        'tanggal_pinjaman' => 'required|date',
        'tanggal_pengembalian' => 'required|date|after_or_equal:tanggal_pinjaman',
        'kode_pbl' => 'required',
        'barang' => 'required|array',
        'barang.*' => 'in:mouse,monitor,keyboard',
    ]);

    $selectedItems = $validatedData['barang'];

    $peminjaman = Peminjaman::create($validatedData);

    foreach ($selectedItems as $item) {
        $goods = Goods::where('name', $item)->first();
        if ($goods) {
            $quantity = 1; // Jumlah barang yang dipinjam
            $peminjaman->goods()->attach($goods->id, ['quantity' => $quantity]);
            $goods->stock -= $quantity;
            $goods->save();
        }
    }

    return redirect()->back()->with('success', 'Form peminjaman berhasil disubmit!');
}



    public function returnForm()
    {
        $goods = Goods::all();

        return view('return-form', compact('goods'));
    }

    public function processReturn(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
            'nama_barang' => 'required'
        ];

        $messages = [
            'nama.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'no_telp.required' => 'Nomor telepon harus diisi.',
            'nama_barang.required' => 'Nama barang harus diisi.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();

        $pengembalian = new Pengembalian;
        $pengembalian->nama = $validatedData['nama'];
        $pengembalian->email = $validatedData['email'];
        $pengembalian->no_telp = $validatedData['no_telp'];
        $pengembalian->nama_barang = $validatedData['nama_barang'];
        $pengembalian->save();

        $goods = Goods::where('name', $validatedData['nama_barang'])->first();
        if ($goods) {
            $goods->stock += 1;
            $goods->save();
        }

        return redirect()->route('pengembalian.sukses');
    }
}
